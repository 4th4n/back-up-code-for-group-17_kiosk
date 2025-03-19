@extends('cashier.dashboard')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center mb-4">
        <div class="col-md-10">
            <h1 class="display-5 text-center fw-bold text-primary mb-3">Cashier Dashboard</h1>
            
            {{-- Flash Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-start border-success border-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('info'))
                <div class="alert alert-info alert-dismissible fade show shadow-sm border-start border-info border-4" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>{{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Order List Card --}}
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-primary">
                            <i class="bi bi-list-check me-2"></i>Order List
                        </h4>
                        <span class="badge bg-primary rounded-pill">{{ $orders->count() }} Orders</span>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($orders->isEmpty())
                        <div class="text-center py-5">
                            <i class="bi bi-cart-x text-muted" style="font-size: 3rem;"></i>
                            <p class="mt-3 text-muted">Wala pang order na natanggap.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
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
                                            <td>
                                                <span class="fw-bold">{{ $order->order_number }}</span>
                                            </td>
                                            <td class="text-start">
                                                <ul class="list-unstyled mb-0">
                                                    @foreach($order->items as $item)
                                                        @if($item && $item->pivot)
                                                            <li>
                                                                <i class="bi bi-circle-fill me-2 text-secondary" style="font-size: 0.5rem;"></i>
                                                                {{ $item->name }} 
                                                                <span class="badge bg-light text-dark">{{ $item->pivot->quantity }} pcs</span>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <i class="bi bi-exclamation-circle-fill me-2 text-warning"></i>
                                                                Item not available
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <span class="fw-bold">₱{{ number_format($order->total_price, 2) }}</span>
                                            </td>
                                            <td>
                                                @if($order->status == 'paid')
                                                    <span class="badge bg-success text-white rounded-pill">
                                                        <i class="bi bi-check-circle-fill me-1"></i>Paid
                                                    </span>
                                                @elseif($order->status == 'unpaid')
                                                    <span class="badge bg-danger text-white rounded-pill">
                                                        <i class="bi bi-x-circle-fill me-1"></i>Unpaid
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning text-dark rounded-pill">
                                                        <i class="bi bi-clock-fill me-1"></i>Pending
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($order->status != 'paid' && $order->status != 'unpaid')
                                                    <div class="btn-group" role="group">
                                                        <form action="{{ route('cashier.complete', $order->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success btn-sm me-1" 
                                                                onclick="return confirm('Are you sure you want to mark this order as Complete?')">
                                                                <i class="bi bi-check-lg me-1"></i>Complete
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('cashier.cancel', $order->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                                onclick="return confirm('Are you sure you want to Cancel this order?')">
                                                                <i class="bi bi-x-lg me-1"></i>Cancel
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <span class="text-muted fst-italic">No Actions Available</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
                <a href="{{ route('cashier.staff') }}" class="btn btn-outline-primary"> Go to staff
                    <i class="bi bi-arrow-right me-1"></i>
                </a>
            </div>


{{-- Bootstrap Icons CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

{{-- Custom CSS --}}
<style>
    .btn {
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.3s;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .card {
        border-radius: 12px;
        overflow: hidden;
    }

    .table th {
        font-weight: 600;
    }

    .badge {
        font-weight: 500;
        padding: 0.55em 0.9em;
    }

    .alert {
        border-radius: 8px;
    }

    .table-responsive {
        border-radius: 0 0 12px 12px;
    }

    .text-primary {
        color: #4361ee !important;
    }

    .bg-primary {
        background-color: #4361ee !important;
    }

    .btn-success {
        background-color: #2bb673;
        border-color: #2bb673;
    }

    .btn-danger {
        background-color: #e63946;
        border-color: #e63946;
    }

    .bg-success {
        background-color: #2bb673 !important;
    }

    .bg-danger {
        background-color: #e63946 !important;
    }

    .bg-warning {
        background-color: #ff9f1c !important;
    }
</style>
@endsection