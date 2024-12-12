@extends('admin.dashboard')

@section('content')
<div class="container my-5">
    <h3 class="text-center mb-4">Order History</h3>

    {{-- Total Paid Amount --}}
    <div class="alert alert-success text-center">
        <strong>Total Paid Amount for Today:</strong> ₱{{ number_format($totalPaidAmount, 2) }}
    </div>

    {{-- Orders Table --}}
    <div class="card">
        <div class="card-body">
            @if($orders->isEmpty())
                <div class="alert alert-info text-center" role="alert">
                    No paid orders found for today.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Status</th> <!-- Added status column -->
                                <th>Total Price</th>
                                <th>Items</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ ucfirst($order->status) }}</td> <!-- Display status -->
                                    <td>₱{{ number_format($order->total_price, 2) }}</td>
                                    <td>
                                        <ul class="list-unstyled mb-0">
                                            @foreach($order->items as $item)
                                                <li>{{ $item->name }} ({{ $item->pivot->quantity }} pcs)</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $order->created_at->timezone('Asia/Manila')->format('F j, Y g:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    @media print {
        button {
            display: none; /* Hide the Print button in print output */
        }
    }
</style>
@endsection
