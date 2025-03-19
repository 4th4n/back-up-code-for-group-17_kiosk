@extends('cashier.dashboard')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="display-5 text-center fw-bold text-primary mb-4">
                <i class="bi bi-cash-coin me-2"></i>Paid Orders
            </h1>

            {{-- Flash Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-start border-success border-4 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- List of Paid Orders --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-light py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-primary">
                            <i class="bi bi-receipt me-2"></i>Paid Orders
                        </h4>
                        <span class="badge bg-success rounded-pill">{{ $orders->count() }} Orders</span>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($orders->isEmpty())
                        <div class="text-center py-5">
                            <i class="bi bi-cash-stack text-muted" style="font-size: 3rem;"></i>
                            <p class="mt-3 text-muted">No paid orders yet.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Order Number</th>
                                        <th>Items</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge bg-light text-primary border border-primary me-2">
                                                        <i class="bi bi-bag-check-fill"></i>
                                                    </span>
                                                    <span class="fw-bold">{{ $order->order_number }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="list-unstyled mb-0">
                                                    @foreach($order->items as $item)
                                                        @if($item && $item->pivot)
                                                            <li class="mb-1">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="bi bi-circle-fill me-2 text-success" style="font-size: 0.5rem;"></i>
                                                                    <span>{{ $item->name }}</span>
                                                                    <span class="badge bg-light text-dark ms-2">{{ $item->pivot->quantity }} pcs</span>
                                                                </div>
                                                            </li>
                                                        @else
                                                            <li class="mb-1">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="bi bi-exclamation-circle-fill me-2 text-warning"></i>
                                                                    <span class="text-muted">Item not available</span>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="text-end">
                                                <span class="fw-bold text-success">₱{{ number_format($order->total_price, 2) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="3" class="text-end fw-bold">Total Revenue:</td>
                                        <td class="text-end fw-bold text-success">₱{{ number_format($orders->sum('total_price'), 2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="{{ route('cashier.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-1"></i> Back to Cashier Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Bootstrap Icons CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

{{-- Custom CSS --}}
<style>
    .btn {
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.3s;
        padding: 0.5rem 1rem;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card {
        border-radius: 12px;
        overflow: hidden;
    }

    .table th {
        font-weight: 600;
    }

    .table td {
        padding: 1rem 0.75rem;
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

    .text-success {
        color: #2bb673 !important;
    }

    .bg-success {
        background-color: #2bb673 !important;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    /* Hover effect on table rows */
    tbody tr:hover {
        background-color: rgba(67, 97, 238, 0.05);
    }
</style>
@endsection