@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Receipt for Order #{{ $order->order_number }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderItems as $item)
            <tr>
                <td>{{ $item->item->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₱{{ number_format($item->price, 2) }}</td>
                <td>₱{{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <hr>
    
    <h3>Total Amount: ₱{{ number_format($totalAmount, 2) }}</h3>
</div>
@endsection
