<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class AdminController extends Controller
// {
//     // Display the admin dashboard
//     public function index()
//     {
//         // Pass data to the view, for example, admin users
//         $adminUsers = User::where('is_admin', true)->get();
//         return view('admin.index', compact('adminUsers'));
//     }

//     // Display a form to add a new admin user
//     public function create()
//     {
//         return view('admin.create');
//     }

//     // Handle form submission for creating an admin user
//     public function store(Request $request)
//     {
//         // Validation and creation logic here
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // Kumuha ng lahat ng items at orders
        $items = Item::all();
        $orders = Order::all();

        // Kumuha ng orders para sa araw na ito na hindi cancelled
        $todayOrders = Order::whereDate('created_at', Carbon::today())
                            ->where('status', '!=', 'Cancelled')
                            ->get();

        // Bilang ng orders ngayong araw
        $totalOrdersToday = $todayOrders->count();

        // Total sales ngayong araw (hindi kasama ang cancelled orders)
        $totalSalesToday = $todayOrders->sum('total_price');

        // Bilang ng items na nasa stock (check kung may laman ang items table)
        $totalItemsInStock = Item::sum('quantity') ?? 0;

        // Mga items na may mababang stock (less than 5)
        $lowStockAlerts = Item::where('quantity', '<', 5)->get();

        // Recent orders ngayong araw
        $recentOrders = Order::whereDate('created_at', Carbon::today())
                            ->where('status', '!=', 'Cancelled')
                            ->with('items')
                            ->latest()
                            ->get();

        // Debugging (Pwede mong tanggalin ito kapag okay na)
        // dd($totalItemsInStock, $lowStockAlerts, $recentOrders);

        // Ibalik ang view na may kasamang data
        return view('admin.dashboard', compact(
            'items',
            'orders',
            'totalOrdersToday',
            'totalSalesToday',
            'totalItemsInStock',
            'lowStockAlerts',+
            'recentOrders'
        ));
    }
}
