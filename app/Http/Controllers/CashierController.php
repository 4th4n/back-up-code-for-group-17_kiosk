<?php

/// app/Http/Controllers/CashierController.php
namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector; //for limux
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector; //for windows
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Events\OrderReadyEvent;


class CashierController extends Controller
{
    // Display Cashier Dashboard
    public function index()
    {
        $orders = Order::whereIn('status', ['pending'])->get(); // Get all orders with these statuses
        $totalAmount = $orders->sum('total_amount'); // Calculate the total amount

        return view('cashier.index', compact('orders', 'totalAmount'));
    }

public function complete($id)
{
    DB::beginTransaction();

    try {
        $order = Order::findOrFail($id);

        if ($order->status !== 'paid') {
            // Mark the order as paid
            $order->status = 'paid';
            $order->save();

            // Get order details
            $order->load('items');
            
            try {
                // Set up printer
                $connector = new WindowsPrintConnector("POS80"); // Make sure this is your actual printer name
                $printer = new Printer($connector);
                
                // Print header
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->setTextSize(2, 2);
                $printer->text("SCHOOL CANTEEN\n"); // Replace with your business name
                $printer->setTextSize(1, 1);
                // $printer->text("Address Line 1\n"); // Replace with your address
                // $printer->text("Address Line 2\n"); // Replace with your address
                // $printer->text("Tel: 123-456-7890\n\n"); // Replace with your phone
                
                // Receipt title
                $printer->setEmphasis(true);
                $printer->text("ORDER RECEIPT\n");
                $printer->setEmphasis(false);
                $printer->text("==============================\n");
                
                // Order info
                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer->text("Order #: " . $order->order_number . "\n");
                $printer->text("Date: " . $order->created_at->format('Y-m-d H:i') . "\n\n");
                
                // Items
                $printer->setEmphasis(true);
                $printer->text("ITEMS:\n");
                $printer->setEmphasis(false);
                
                foreach ($order->items as $item) {
                    $itemName = $item->name ?? 'Unknown Item';
                    $price = number_format($item->pivot->price, 2);
                    $subtotal = number_format($item->pivot->quantity * $item->pivot->price, 2);
                    
                    $printer->text($item->pivot->quantity . " x " . $itemName . "\n");
                    // $printer->text("   " . $price . " each = " . $subtotal . "\n");
                }
                
                // Totals
                $printer->text("------------------------------\n");
                $printer->text("SUBTOTAL: " . number_format($order->total_price, 2) . "\n");
                
                if (isset($order->tax_amount)) {
                    $printer->text("TAX: " . number_format($order->tax_amount, 2) . "\n");
                }
                
                $printer->setEmphasis(true);
                $printer->text("TOTAL: " . number_format($order->total_price, 2) . "\n");
                $printer->setEmphasis(false);
                
                $printer->text("==============================\n");
                $printer->text("Payment Method: " . ($order->payment_method ?? 'Cash') . "\n");
                $printer->text("==============================\n\n");
                
                // Footer
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text("Thank you for your purchase!\n");
                $printer->text("Please come again.\n\n");
                
                // Cut receipt and close
                $printer->feed(3);
                $printer->cut();
                $printer->close();
                
                DB::commit();
                return redirect()->route('cashier.index')->with('success', 'Order marked as paid and receipt printed.');
            } catch (\Exception $e) {
                // If printer error occurs, still mark order as paid but show printer error
                DB::commit();
                return redirect()->route('cashier.index')->with('warning', 'Order marked as paid but printer error occurred: ' . $e->getMessage());
            }
        }

        DB::commit();
        return redirect()->route('cashier.index')->with('info', 'Order is already paid.');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('cashier.index')->with('error', 'May error habang inaayos ang order: ' . $e->getMessage());
    }
}

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
    
        // Siguraduhin na PENDING lang ang maaaring i-cancel
        if ($order->status !== 'pending') {
            return redirect()->route('cashier.index')->with('info', 'Only pending orders can be canceled.');
        }
    
        // Balik sa stock ang mga items ng order
        foreach ($order->items as $item) {
            if ($item->pivot) {
                $item->quantity += $item->pivot->quantity; // Ibalik ang quantity sa stock
                $item->save();
            }
        }
    
        // Baguhin ang status ng order sa 'cancelled'
        $order->status = 'cancelled';
        $order->save();
    
        return redirect()->route('cashier.index')->with('success', 'Order cancelled, and items have been restocked.');
    }
    
    
    public function paidOrders()
{
    // Kunin ang lahat ng paid orders na ginawa lang ngayong araw
    $orders = Order::where('status', 'paid')
                    ->whereDate('created_at', today()) // Kinukuha lang yung mga binayaran ngayong araw
                    ->with('items')
                    ->get();

    return view('cashier.staff', compact('orders'));
}


public function generateReceipt($id)
{
    // Find the order by ID along with its items
    $order = Order::with('items')->findOrFail($id);

    // Make sure the order has been paid
    if ($order->status !== 'paid') {
        return redirect()->route('cashier.paidOrders')->with('info', 'This order has not been paid yet.');
    }

    // Return the receipt view with the order details
    return view('cashier.receipt', compact('order'));
}

/**
 * Mark an order as ready for pickup using AJAX
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\JsonResponse
 */
public function markOrderReady(Request $request)
{
    try {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
        ]);

        $order = Order::findOrFail($validated['order_id']);
        $order->is_ready = true;
        $order->ready_at = now();
        $order->save();
        return response()->json([
            'success' => true,
            'message' => 'Order marked as ready successfully',
            'order' => [
                'id' => $order->id,
                'order_number' => $order->order_number,
                'ready_at' => $order->ready_at,
                'ready_at_human' => $order->ready_at->diffForHumans(),
            ]
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to mark order as ready: ' . $e->getMessage()
        ], 500);
    }
}


}
