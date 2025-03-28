@extends('admin.dashboard')
@section('content')
<div class="container-fluid px-4 py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            {{-- Page Header --}}
            <div class="mb-4 text-center">
                <h2 class="display-6 fw-bold text-primary mb-3">
                    <i class="fas fa-file-invoice-dollar me-3 text-muted"></i>Orders Report
                </h2>
                <hr class="border-primary opacity-50 w-50 mx-auto">
            </div>

            {{-- Total Paid Amount Summary --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body bg-gradient-primary text-white py-3 text-center">
                            <h4 class="mb-0">
                                <strong>Total Paid Amount Today:</strong> 
                                <span class="text-warning ms-2">₱{{ number_format($totalPaidAmount, 2) }}</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Ordered Items Summary --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-soft-primary py-3">
                            <h5 class="text-center mb-0 text-primary">
                                <i class="fas fa-box-open me-2"></i>Items Ordered Today
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @if($orderedItems->isEmpty())
                                <div class="alert alert-light text-center mb-0 py-3">
                                    <i class="fas fa-info-circle text-muted me-2"></i>
                                    No items ordered today
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="ps-4">Item Name</th>
                                                <th class="text-end pe-4">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orderedItems as $item)
                                            <tr>
                                                <td class="ps-4">{{ $item['name'] }}</td>
                                                <td class="text-end pe-4">{{ $item['total_quantity'] }}</td>
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

            {{-- Paid Orders Table --}}
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-soft-primary py-3">
                            <h5 class="text-center mb-0 text-primary">
                                <i class="fas fa-receipt me-2"></i>Paid Orders Today
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @if($paidOrdersToday->isEmpty())
                                <div class="alert alert-light text-center mb-0 py-3">
                                    <i class="fas fa-info-circle text-muted me-2"></i>
                                    No paid orders found today
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="ps-4">Order Number</th>
                                                <th class="text-end">Total Price</th>
                                                <th>Items</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($paidOrdersToday as $order)
                                            <tr>
                                                <td class="ps-4">{{ $order->order_number }}</td>
                                                <td class="text-end">₱{{ number_format($order->total_price, 2) }}</td>
                                                <td>
                                                    <ul class="list-unstyled mb-0">
                                                        @foreach($order->items as $item)
                                                        <li class="small">
                                                            {{ $item->name }} 
                                                            <span class="text-muted">({{ $item->pivot->quantity }} pcs)</span>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td class="small">
                                                    {{ $order->created_at->timezone('Asia/Manila')->format('F j, Y g:i A') }}
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

            {{-- Print Button --}}
            <div class="text-center mt-4">
                <button onclick="window.print()" class="btn btn-primary btn-lg shadow-sm px-4">
                    <i class="fas fa-print me-2"></i>Print Report
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Custom Print Styles --}}
<style>
    body {
        background-color: #f4f6f9;
    }
    .bg-gradient-primary {
        background: linear-gradient(to right, #4e73de, #224abe);
    }
    .bg-soft-primary {
        background-color: #e6ebf5;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0,123,255,0.075);
    }
    @media print {
        body {
            background: white !important;
        }
        body * {
            visibility: hidden;
        }
        .card {
            visibility: visible;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        button {
            display: none;
        }
    }
</style>

{{-- Font Awesome --}}
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endpush
@endsection