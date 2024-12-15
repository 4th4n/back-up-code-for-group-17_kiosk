@extends('admin.dashboard')

@section('content')
<div class="container my-5">
    <h3 class="text-center mb-4">Daily Paid Orders Report</h3>

    {{-- Total Paid Amount --}}
    <div class="alert alert-success text-center">
        <strong>Total Paid Amount for Today:</strong> ₱{{ number_format($totalPaidAmount, 2) }}
    </div>

    {{-- Ordered Items Summary --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white text-center">
            <strong>Summary of Items Ordered Today</strong>
        </div>
        <div class="card-body">
            @if($orderedItems->isEmpty())
                <div class="alert alert-info text-center">
                    No items ordered today.
                </div>
            @else
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Total Quantity Ordered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderedItems as $item)<tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['total_quantity'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    {{-- Orders Table --}}
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <strong>Paid Orders for Today</strong>
        </div>
        <div class="card-body">
            @if($paidOrdersToday->isEmpty())
                <div class="alert alert-info text-center">
                    No paid orders found for today.
                </div>
            @else
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Total Price</th>
                            <th>Items</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paidOrdersToday as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
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
            @endif
        </div>
    </div>
</div>

{{-- Print Button --}}
<div class="text-center mt-4">
    <button onclick="window.print()" class="btn btn-primary">Print Report</button>
</div>

<style>
    @media print {
        button {
            display: none; /* Hide Print button during print */
        }
    }
</style>
@endsection
