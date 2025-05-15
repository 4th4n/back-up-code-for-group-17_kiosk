<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon; 
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector; //for limux
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector; //for windows
use Illuminate\Support\Facades\Route;


class OrderController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $order = session()->get('order', []);

        // Calculate total amount
        $totalAmount = collect($order)->sum(function($details) {
            return $details['price'] * $details['quantity'];
        });

        return view('kiosk.index', compact('items', 'order', 'totalAmount'));
    }
    
    public function addToOrder(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer|exists:items,id',
        ]);

        $item = Item::find($request->item_id);

        if (!$item || $item->quantity <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Item is out of stock or not found.'
            ]);
        }

        $order = session()->get('order', []);

        if (isset($order[$item->id])) {
            $newQuantity = $order[$item->id]['quantity'] + 1;

            if ($newQuantity > $item->quantity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Not enough stock available for this item.'
                ]);
            }

            $order[$item->id]['quantity'] = $newQuantity;
        } else {
            $order[$item->id] = [
                "name" => $item->name,
                "price" => $item->price,
                "quantity" => 1,
            ];
        }

        session()->put('order', $order);

        $total = collect(session('order'))->sum(fn($item) => $item['price'] * $item['quantity']);

        return response()->json([
            'success' => true,
            'message' => "{$item->name} added to order.",
            'item_id' => $item->id,
            'quantity' => $order[$item->id]['quantity'],
            'cart_count' => count($order),
            'total' => $total,
        ]);

    }


    // new code para ma get ang order
    // public function getAllOrders()
    // {
    //     $totalAmount = collect(session('order'))->sum(function ($item) {
    //         return $item['price'] * $item['quantity'];
    //     });
    
    //     return view('kiosk.index', compact('totalAmount'))->render();
    // }
    
  
    // public function checkout(Request $request)
    // {
    //     DB::beginTransaction();
        
    //     try {
    //         // Get order data from session
    //         $orderData = $request->session()->get('order');
        
    //         // Validate if the order has items
    //         if (!$orderData || !is_array($orderData)) {
    //             return redirect()->route('kiosk.index')->with('error', 'Walang order na available.');
    //         }

    //         // Set default quantity to 1 if not set, and compute the total price
    //         $orderData = collect($orderData)->map(function ($details) {
    //             // Default quantity to 1 if not already set or less than 1
    //             $details['quantity'] = isset($details['quantity']) && $details['quantity'] > 0 ? $details['quantity'] : 1;
    //             return $details;
    //         })->toArray();

    //         // Calculate total price based on updated quantities
    //         $totalPrice = collect($orderData)->sum(function ($details) {
    //             return $details['price'] * $details['quantity'];
    //         });

    //         // Create a new order with a unique order number
    //         $order = Order::create([
    //             'order_number' => strtoupper(str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT)),
    //             'total_price' => $totalPrice,
    //             'completed' => false,
    //         ]);

    //         // Process each item in the order
    //         foreach ($orderData as $itemId => $details) {
    //             // Find the item in the database
    //             $item = Item::find($itemId);

    //             // Handle case if the item does not exist
    //             if (!$item) {
    //                 DB::rollBack();
    //                 return redirect()->route('kiosk.index')->with('error', "Item na may ID {$itemId} ay hindi nahanap.");
    //             }

    //             // Handle case if there is insufficient stock
    //             if ($item->quantity < $details['quantity']) {
    //                 DB::rollBack();
    //                 return redirect()->route('kiosk.index')->with('error', "Kulang ang stock para sa {$item->name}.");
    //             }

    //             // Decrease the item's stock based on the quantity ordered
    //             $item->decrement('quantity', $details['quantity']);

    //             // Save the order item details in the database
    //             OrderItem::create([
    //                 'order_id' => $order->id,
    //                 'item_id' => $itemId,
    //                 'quantity' => $details['quantity'],
    //                 'price' => $details['price'],
    //             ]);
    //         }

    //         // Clear the session order data after checkout
    //         $request->session()->forget('order');

    //         DB::commit();

    //         // Redirect to the order view page with the order number
    //         return redirect()->route('order.view', ['orderNumber' => $order->order_number])
    //             ->with('success', "Order #{$order->order_number} na-save at naka-checkout na!");
    //     } catch (\Exception $e) {
    //         // Rollback the transaction in case of error
    //         DB::rollBack();
    //         return redirect()->route('kiosk.index')->with('error', 'May error sa pag-checkout: ' . $e->getMessage());
    //     }
    // }

    
    public function checkout(Request $request)
{
    DB::beginTransaction();
    
    try {
        $orderData = $request->session()->get('order');

        if (!$orderData || !is_array($orderData)) {
            return redirect()->route('kiosk.index')->with('error', 'Walang order na available.');
        }

        $orderData = collect($orderData)->map(function ($details) {
            $details['quantity'] = isset($details['quantity']) && $details['quantity'] > 0 ? $details['quantity'] : 1;
            return $details;
        })->toArray();

        $totalPrice = collect($orderData)->sum(function ($details) {
            return $details['price'] * $details['quantity'];
        });

        $order = Order::create([
            'order_number' => strtoupper(str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT)),
            'total_price' => $totalPrice,
            'completed' => false,
        ]);

        foreach ($orderData as $itemId => $details) {
            $item = Item::find($itemId);

            if (!$item) {
                DB::rollBack();
                return redirect()->route('kiosk.index')->with('error', "Item na may ID {$itemId} ay hindi nahanap.");
            }

            if ($item->quantity < $details['quantity']) {
                DB::rollBack();
                return redirect()->route('kiosk.index')->with('error', "Kulang ang stock para sa {$item->name}.");
            }

            $item->decrement('quantity', $details['quantity']);

            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $itemId,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }

        $request->session()->forget('order');
        DB::commit();

        $request = Request::create(route('order.print', ['orderNumber' => $order->order_number]), 'GET');
        $response = Route::dispatch($request);

        // Get the content (HTML or text)
        $content = $response->getContent();
        

        // $connector = new FilePrintConnector("/dev/usb/lp0");

        
        $connector = new WindowsPrintConnector("POS80");
        $printer = new Printer($connector);
        $printer->text($content);
        $printer->cut();
        $printer->close();
        return redirect()->back();
    } catch (\Exception $e) {
        DB::rollBack();
        dd($e->getMessage());
        return redirect()->route('kiosk.index')->with('error', 'May error sa pag-checkout: ' . $e->getMessage());
    }
}

    
    public function viewOrder($orderNumber)
    {
        // Fetch the order by its order_number
        $order = Order::where('order_number', $orderNumber)->firstOrFail();
    
        return view('order.view', compact('order'));
    }
    

    public function update(Request $request)
    {
        \Log::info('Update triggered:', $request->all()); // Add this to check logs
    
        $order = session()->get('order');
        $itemId = $request->input('item_id');
        $action = $request->input('action');
    
        if (!$order || !isset($order[$itemId])) {
            return response()->json(['success' => false, 'message' => 'Item not found.']);
        }
    
        $quantity = $order[$itemId]['quantity'];
    
        if ($action === 'increase') {
            $quantity++;
        } elseif ($action === 'decrease' && $quantity > 1) {
            $quantity--;
        }
    
        $order[$itemId]['quantity'] = $quantity;
        session()->put('order', $order);
    
        $itemTotal = $order[$itemId]['price'] * $quantity;
        $total = collect($order)->sum(fn($item) => $item['price'] * $item['quantity']);
    
        return response()->json([
            'success' => true,
            'quantity' => $quantity,
            'item_total' => $itemTotal,
            'total' => $total
        ]);
    }
    
    public function completeOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->completed = request()->has('completed');
        $order->save();
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
    
function orderHistory(Request $request)
    {
        // Kunin ang petsa mula sa request, default sa ngayong araw
        $date = $request->input('date', date('Y-m-d'));
        
        // I-parse ang petsa
        $filterDate = Carbon::parse($date);
        
        // Kunin ang lahat ng orders, paid at unpaid
        $orders = Order::with('items')
            ->whereDate('created_at', $filterDate)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Kunin ang lahat ng paid orders para sa napiling araw
        $paidOrders = Order::where('status', 'paid')
            ->whereDate('created_at', $filterDate)
            ->get();
        
        // Kalkulahin ang kabuuang halaga ng paid orders sa napiling araw
        $totalPaidAmount = $paidOrders->sum('total_price');
        
        // Ibalik ang lahat ng orders, kabuuang halaga ng paid orders, at ang napiling petsa sa view
        return view('admin.history', compact('orders', 'totalPaidAmount', 'date'));
    }
    public function removeFromOrder(Request $request)
    {
        // Validate the request to ensure the item_id is provided and exists
        $request->validate([
            'item_id' => 'required|integer|exists:items,id',
        ]);

        // Get the order from the session
        $order = session('order', []);

        // Remove the item from the order
        $itemId = $request->input('item_id');
        if (isset($order[$itemId])) {
            unset($order[$itemId]);
        }

        // Save the updated order back to the session
        session(['order' => $order]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Item removed from order successfully.');
    }

    public function viewCart()
{
    $totalAmount = 0;

    if (session('order')) {
        foreach (session('order') as $id => $details) {
            $totalAmount += $details['price'] * $details['quantity'];
        }
    }

    return view('partials.cart-modal', compact('totalAmount'))->render();
}
// OrderController.php

// public function showReadyOrders()
// {
//     $readyOrders = Order::where('status', 'ready')
//                         ->orderBy('ready_at')
//                         ->get();

//     return view('orders.display', compact('readyOrders'));
// }

// public function markAsReady($id)
// {
//     $order = Order::findOrFail($id);
//     $order->status = 'ready';
//     $order->ready_at = now();
//     $order->save();

//     return redirect()->back()->with('success', 'Order marked as ready.');
// }

// public function markAsPickedUp($id)
// {
//     $order = Order::findOrFail($id);
//     $order->delete(); // Or change status if you want to archive

//     return redirect()->back()->with('success', 'Order picked up.');
// }
// // OrderController.php
public function autoPickUp(Request $request)
{
    $order = Order::find($request->id);
    if ($order && $order->status === 'ready') {
        $order->status = 'picked_up';
        $order->save();
    }

    return response()->json(['success' => true]);
}


public function markCompleted(Request $request)
{
    $orderId = $request->input('id');

    // Find the order
    $order = Order::find($orderId);

    if (!$order) {
        return response()->json([
            'success' => false,
            'message' => 'Order not found'
        ], 404);
    }

    // Update the order's status and mark it as completed
    $order->status = 'completed';
    $order->completed = true; // ✅ Only using the existing 'completed' column
    $order->save();

    // ✅ Fire the event (make sure the OrderCompleted event exists)
    // event(new OrderCompleted($order));

    return response()->json([
        'success' => true,
        'message' => 'Order marked as completed'
    ]);
}

public function getReadyOrders()
{
    $readyOrders = Order::where('is_ready', true)
                        ->whereDate('ready_at', now()->toDateString())
                        ->orderBy('ready_at')
                        ->get();

    $orders = $readyOrders->map(function ($order) {
        return [
            'id' => $order->id,
            'order_number' => $order->order_number,
            'ready_at' => $order->ready_at,
            'ready_at_human' => $order->ready_at->diffForHumans(),
        ];
    });

    return response()->json($orders);
}


}

