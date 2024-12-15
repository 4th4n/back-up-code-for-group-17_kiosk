@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Cashier Dashboard</h1>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Listahan ng mga order --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order List</h4>
                </div>
                <div class="card-body">
                    @if($orders->isEmpty())
                        <p class="text-center">Wala pang order na natanggap.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Number</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Actions</th>
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
                                        <td>
                                            @if($order->status == 'paid')
                                                <span class="badge bg-success">Paid</span>
                                            @elseif($order->status == 'unpaid')
                                                <span class="badge bg-danger">Unpaid</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->status != 'paid' && $order->status != 'unpaid')
                                                <form action="{{ route('cashier.complete', $order->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Complete</button>
                                                </form>
                                                  <form action="{{ route('cashier.cancel', $order->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                            </form>
                                            @else
                                                <span class="text-muted">No Actions Available</span>
                                            @endif
                                          
                                        </td>
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

{{-- Custom CSS --}}
<style>
    .btn {
        font-weight: bold;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .card {
        border-radius: 10px;
    }

    .card-header {
        background-color: #f8f9fa;
        font-weight: bold;
    }
</style>
@endsection
