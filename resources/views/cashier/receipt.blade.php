{{-- resources/views/cashier/receipt.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Receipt</h2>
    <div class="text-center">
        <h4>Order Number: {{ $order->order_number }}</h4>
        <p><strong>Date:</strong> {{ $order->created_at->format('F d, Y h:i A') }}</p>
    </div>
    <hr>

    <h5>Items:</h5>
    <ul>
        @foreach($order->items as $item)
            <li>{{ $item->name }} ({{ $item->pivot->quantity }} pcs) - ₱{{ number_format($item->pivot->quantity * $item->price, 2) }}</li>
        @endforeach
    </ul>

    <hr>

    <div class="text-right">
        <h4><strong>Total:</strong> ₱{{ number_format($order->total_price, 2) }}</h4>
    </div>

    <hr>
    <div class="text-center">
        <p><strong>Status:</strong> Paid</p>
        <p>Thank you for your purchase!</p>
    </div>
</div>
@endsection
