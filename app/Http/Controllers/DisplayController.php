<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DisplayController extends Controller
{
    /**
     * Display the order board.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get orders that are ready for pickup
        $readyOrders = Order::where('is_ready', true)
                           ->where('status', 'paid')
                           ->orderBy('ready_at', 'desc')
                           ->get();
        
        return view('display.board', compact('readyOrders'));
    }
}