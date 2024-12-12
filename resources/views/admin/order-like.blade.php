@extends('admin.dashboard')

@section('content')
    <h1>Order Details</h1>

    <p>Order Number: {{ $order->order_number }}</p>
    <p>Total Price: ₱{{ number_format($order->total_price, 2) }}</p>
    <p>Items:</p>
    <ul>
        @foreach($order->items as $item)
            <li>{{ $item->name }} ({{ $item->pivot->quantity }} pcs) - ₱{{ number_format($item->pivot->price, 2) }}</li>
        @endforeach
    </ul>

    <form action="{{ route('orders.like', ['orderId' => $order->id]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Ready to Serve</button>
    </form>

    <a href="{{ route('admin.history') }}" class="btn btn-secondary mt-3">Back to Order History</a>
@endsection
