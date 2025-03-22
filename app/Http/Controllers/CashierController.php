<?php

/// app/Http/Controllers/CashierController.php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    // Display Cashier Dashboard
    public function index()
    {
        $orders = Order::whereIn('status', ['pending'])->get(); // Get all orders with these statuses
        $totalAmount = $orders->sum('total_amount'); // Calculate the total amount

        return view('cashier.index', compact('orders', 'totalAmount'));
    }

    // Mark order as completed (paid)
    public function complete($id)
    {
        $order = Order::findOrFail($id);
    
        if ($order->status !== 'paid') {
            // Update the status to 'paid'
            $order->status = 'paid';
            $order->save(); // Save changes to the database
    
            // Redirect to the receipt page for this order
            return redirect()->route('cashier.generateReceipt', $order->id)->with('success', 'Order marked as paid successfully.');
        }
    
        return redirect()->route('cashier.index')->with('info', 'Order is already paid.');
    }
    

    // Cancel the order (unpaid)
    // public function cancel($id)
    // {
    //     $order = Order::findOrFail($id);
    //     $order->status = 'unpaid'; // Update status to 'unpaid'
    //     $order->save();

    //     return redirect()->route('cashier.index')->with('success', 'Order cancelled and marked as unpaid.');
    // }
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

// app/Http/Controllers/CashierController.php
// app/Http/Controllers/CashierController.php

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



}
