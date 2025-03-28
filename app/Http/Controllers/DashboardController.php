<?php
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Order;
// use App\Models\Item;
// use Carbon\Carbon;

// class DashboardController extends Controller
// {
//     public function index()
//     {

//     $todayOrders = Order::whereDate('created_at', Carbon::today())
//                         ->where('status', '!=', 'Cancelled') // Exclude Cancelled Orders
//                         ->get();

//     // Bilang ng orders today
//     $totalOrdersToday = $todayOrders->count();

//     // Total sales today (excluding cancelled)
//     $totalSalesToday = $todayOrders->sum('total_price');

//     // Total items in stock
//     $totalItemsInStock = Item::sum('quantity');

//     // Low stock alerts (halimbawa: below 5 items)
//     $lowStockAlerts = Item::where('quantity', '<', 5)->get();

//     // Recent orders today only
//     $recentOrders = Order::whereDate('created_at', Carbon::today())
//                          ->where('status', '!=', 'Cancelled') // Exclude Cancelled Orders
//                          ->with('items')
//                          ->latest()
//                          ->get();

//     return view('admin.dashboard', compact(
//         'totalOrdersToday', 
//         'totalSalesToday', 
//         'totalItemsInStock', 
//         'lowStockAlerts', 
//         'recentOrders'
//     ));
// }
// }

