@extends('admin.dashboard')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0 mb-4 overflow-hidden">
        <div class="card-header bg-gradient-primary text-white py-3 border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fw-bold mb-0">
                    <i class="fas fa-history me-2"></i>Order History
                </h3>
                <button onclick="window.print()" class="btn btn-light btn-sm">
                    <i class="fas fa-print me-1"></i> Save Report
                </button>
            </div>
        </div>
        
        <div class="card-body p-4">
            {{-- Date Filter & Stats Card --}}
            <div class="row mb-4 g-3">
                <div class="col-md-7">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="text-muted mb-3">
                                <i class="fas fa-calendar-alt me-2"></i>Select Date
                            </h5>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fas fa-search text-primary"></i>
                                </span>
                                <input type="date" class="form-control border-start-0 ps-0" id="dateFilter" value="{{ $date ?? date('Y-m-d') }}">
                                <button class="btn btn-primary px-4" type="button" id="filterBtn">
                                    <i class="fas fa-filter me-2"></i>Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card border-0 bg-gradient-success text-white shadow-sm h-100">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <h5 class="mb-2 opacity-75">
                                    @if(isset($date) && $date != date('Y-m-d'))
                                        Revenue for {{ \Carbon\Carbon::parse($date)->format('F j, Y') }}
                                    @else
                                        Today's Revenue
                                    @endif
                                </h5>
                                <div class="d-flex align-items-center justify-content-center">
                                    <i class="fas fa-coins fs-1 me-3 opacity-75"></i>
                                    <span class="display-5 fw-bold">₱{{ number_format($totalPaidAmount, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Orders Section --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-primary">
                        <i class="fas fa-shopping-bag me-2"></i>Orders List
                    </h5>
                </div>
                <div class="card-body p-0">
                    {{-- Orders Table --}}
                    @if($orders->isEmpty())
                        <div class="alert alert-info m-4 text-center py-5" role="alert">
                            <i class="fas fa-info-circle me-2 fs-3 d-block mb-3 opacity-75"></i>
                            <span class="fs-5">No paid orders found for {{ isset($date) ? \Carbon\Carbon::parse($date)->format('F j, Y') : 'today' }}.</span>
                            <p class="mt-2 mb-0 text-muted">Try selecting a different date or check back later.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="py-3 px-4 text-uppercase text-muted fs-6"><i class="fas fa-hashtag me-1"></i> Order</th>
                                        <th class="py-3 text-uppercase text-muted fs-6"><i class="fas fa-tag me-1"></i> Status</th>
                                        <th class="py-3 text-uppercase text-muted fs-6"><i class="fas fa-dollar-sign me-1"></i> Total</th>
                                        <th class="py-3 text-uppercase text-muted fs-6"><i class="fas fa-box me-1"></i> Items</th>
                                        <th class="py-3 text-uppercase text-muted fs-6"><i class="fas fa-clock me-1"></i> Date & Time</th>
                                        <th class="py-3 text-uppercase text-muted fs-6 text-center"><i class="fas fa-cog me-1"></i> Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr class="border-bottom">
                                            <td class="align-middle py-3 px-4 fw-bold">{{ $order->order_number }}</td>
                                            <td class="align-middle">
                                                @if($order->status == 'paid')
                                                    <span class="badge bg-success text-white px-3 py-2 rounded-pill">
                                                        <i class="fas fa-check-circle me-1"></i> Paid
                                                    </span>
                                                @elseif($order->status == 'pending')
                                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                                        <i class="fas fa-clock me-1"></i> Pending
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary text-white px-3 py-2 rounded-pill">
                                                        <i class="fas fa-info-circle me-1"></i> {{ ucfirst($order->status) }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="align-middle fw-bold fs-5">₱{{ number_format($order->total_price, 2) }}</td>
                                            <td class="align-middle">
                                                <button class="btn btn-sm btn-outline-primary rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#items{{ $order->id }}" aria-expanded="false">
                                                    <i class="fas fa-list me-1"></i> {{ count($order->items) }} items
                                                </button>
                                                <div class="collapse mt-2" id="items{{ $order->id }}">
                                                    <div class="card card-body py-2 border-0 bg-light">
                                                        <ul class="list-group list-group-flush">
                                                            @foreach($order->items as $item)
                                                                <li class="list-group-item bg-transparent px-0 py-2 border-bottom border-light">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div>
                                                                            <span class="fw-medium">{{ $item->name }}</span>
                                                                            <small class="d-block text-muted">{{ $item->sku ?? 'No SKU' }}</small>
                                                                        </div>
                                                                        <div>
                                                                            <span class="badge bg-primary rounded-pill">
                                                                                <i class="fas fa-times me-1"></i>{{ $item->pivot->quantity }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex flex-column">
                                                    <span class="text-dark">
                                                        <i class="fas fa-calendar-day me-1 text-muted"></i> 
                                                        {{ $order->created_at->timezone('Asia/Manila')->format('F j, Y') }}
                                                    </span>
                                                    <span class="text-muted small">
                                                        <i class="fas fa-clock me-1"></i>
                                                        {{ $order->created_at->timezone('Asia/Manila')->format('g:i A') }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" title="Print Invoice">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Download">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
                
            {{-- Summary Stats --}}
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card border-0 bg-gradient-primary text-white shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-uppercase mb-1 opacity-75">Total Orders</h6>
                                    <h2 class="display-5 fw-bold mb-0">{{ $orders->count() }}</h2>
                                </div>
                                <div class="icon-box bg-white bg-opacity-25 p-3 rounded-circle">
                                    <i class="fas fa-shopping-cart text-white fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 bg-gradient-info text-white shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-uppercase mb-1 opacity-75">Average Order</h6>
                                    <h2 class="display-5 fw-bold mb-0">₱{{ number_format($orders->count() > 0 ? $totalPaidAmount / $orders->count() : 0, 2) }}</h2>
                                </div>
                                <div class="icon-box bg-white bg-opacity-25 p-3 rounded-circle">
                                    <i class="fas fa-chart-line text-white fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 bg-gradient-warning text-dark shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-uppercase mb-1 opacity-75">Highest Order</h6>
                                    <h2 class="display-5 fw-bold mb-0">₱{{ number_format($orders->max('total_price') ?? 0, 2) }}</h2>
                                </div>
                                <div class="icon-box bg-white bg-opacity-25 p-3 rounded-circle">
                                    <i class="fas fa-trophy text-dark fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styles */
    .table th, .table td {
        vertical-align: middle;
    }
    
    .card {
        border-radius: 0.6rem;
        overflow: hidden;
    }
    
    .badge {
        font-weight: 500;
        border-radius: 30px;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df, #224abe);
    }
    
    .bg-gradient-success {
        background: linear-gradient(45deg, #1cc88a, #13855c);
    }
    
    .bg-gradient-info {
        background: linear-gradient(45deg, #36b9cc, #258391);
    }
    
    .bg-gradient-warning {
        background: linear-gradient(45deg, #f6c23e, #dda20a);
    }
    
    .icon-box {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(78, 115, 223, 0.05);
    }
    
    /* Print Styles */
    @media print {
        .btn, #filterBtn, .input-group, button, .btn-group {
            display: none !important;
        }
        
        .card {
            box-shadow: none !important;
            border: none !important;
        }
        
        .card-header {
            background-color: white !important;
            color: black !important;
            border-bottom: 1px solid #ddd !important;
        }
        
        .bg-gradient-primary, .bg-gradient-success, .bg-gradient-info, .bg-gradient-warning {
            background: white !important;
            color: black !important;
        }
        
        .text-white {
            color: black !important;
        }
        
        body {
            font-size: 12pt;
        }
        
        .collapse {
            display: block !important;
        }
        
        .table {
            border-collapse: collapse !important;
        }
        
        .table td, .table th {
            background-color: white !important;
        }
        
        .icon-box {
            border: 1px solid #ddd !important;
            background: white !important;
        }
        
        .icon-box i {
            color: black !important;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle the filter button click
    document.getElementById('filterBtn').addEventListener('click', function() {
        const selectedDate = document.getElementById('dateFilter').value;
        if (selectedDate) {
            // Redirect to the same page with date parameter
            window.location.href = window.location.pathname + '?date=' + selectedDate;
        }
    });

    // Set the date filter value from URL if present
    const urlParams = new URLSearchParams(window.location.search);
    const dateParam = urlParams.get('date');
    if (dateParam) {
        document.getElementById('dateFilter').value = dateParam;
    }

    // Initialize print functionality
    document.querySelector('button[onclick="window.print()"]').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default handler
        window.print(); // Trigger print
    });
});
</script>
@endsection