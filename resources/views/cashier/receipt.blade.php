@extends('cashier.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm" style="border-radius: 10px; border: none;">
                <div class="card-body">
                    <h2 class="text-center mb-4" style="color: #4CAF50; font-weight: bold;">Receipt</h2>
                    <div class="text-center">
                        <h4>Order Number: <span class="text-muted">{{ $order->order_number }}</span></h4>
                        <p><strong>Date:</strong> {{ $order->created_at->format('F d, Y h:i A') }}</p>
                    </div>
                    <hr>

                    <h5 style="color: #333;">Items:</h5>
                    <ul class="list-unstyled">
                        @foreach($order->items as $item)
                            <li class="d-flex justify-content-between" style="border-bottom: 1px solid #ddd; padding: 8px 0;">
                                <span>{{ $item->name }} ({{ $item->pivot->quantity }} pcs)</span>
                                <span>₱{{ number_format($item->pivot->quantity * $item->price, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <hr>

                    <div class="d-flex justify-content-between" style="font-size: 1.2rem;">
                        <strong>Total:</strong>
                        <span>₱{{ number_format($order->total_price, 2) }}</span>
                    </div>

                    <hr>

                    <div class="text-center">
                        <p class="mb-0" style="font-weight: bold; color: #e74c3c;">Status: <span class="text-success">Paid</span></p>
                        <p class="mt-2">Thank you for your purchase!</p>
                        <a href="{{ route('cashier.index') }}" class="btn btn-success mt-3" style="border-radius: 10px; padding: 10px 20px; font-weight: bold;">Back to Cahsier Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.card-body {
    font-family: 'Arial', sans-serif;
}

h2, h4, h5 {
    font-family: 'Roboto', sans-serif;
}

ul {
    padding-left: 0;
}

ul li {
    font-size: 1rem;
}

.text-muted {
    color: #777;
}

.text-success {
    color: #2ecc71;
}

.text-right {
    text-align: right;
}

.mb-4, .mt-2 {
    margin-bottom: 1.5rem;
}

.text-center {
    text-align: center;
}

</style>
@endsection

<!-- receipt -->