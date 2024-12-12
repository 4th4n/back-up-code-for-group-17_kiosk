@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Paid Orders</h1>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- List of Paid Orders --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Paid Orders</h4>
                </div>
                <div class="card-body">
                    @if($orders->isEmpty())
                        <p class="text-center">No paid orders yet.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Number</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>
                                            <ul class="list-unstyled mb-0">
                                                @foreach($order->items as $item)
                                                    @if($item && $item->pivot)
                                                        <li>{{ $item->name }} ({{ $item->pivot->quantity }} pcs)</li>
                                                    @else
                                                        <li>Item not available</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>₱{{ number_format($order->total_price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
