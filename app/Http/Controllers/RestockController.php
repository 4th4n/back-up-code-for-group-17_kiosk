<?php

// app/Http/Controllers/RestockController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class RestockController extends Controller
{
    // Display the restock page
    public function index()
    {
        // Kunin ang lahat ng items para ma-display
        $items = Item::all(); 
    
        // Bilangin ang mga item na may mababang stock (halimbawa: less than 10)
        $lowStockCount = Item::where('quantity', '>', 0)->where('quantity', '<', 10)->count();
    
        // Bilangin ang mga item na out of stock (0 quantity)
        $outOfStockCount = Item::where('quantity', '=', 0)->count();
    
        return view('admin.restock', compact('items', 'lowStockCount', 'outOfStockCount'));
    }
    

    // Handle the restocking of items
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $item = Item::find($request->item_id);

        // Update the stock of the item
        $item->increment('quantity', $request->quantity);

        return redirect()->route('restock.index')->with('success', "{$item->name} stock has been updated by {$request->quantity}.");
    }
}
