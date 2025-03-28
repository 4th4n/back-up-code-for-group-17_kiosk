@extends('admin.layout') {{-- Dapat layout file ang gagamitin --}}

@section('title', 'Admin Dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <!-- Statistics -->
    <div class="row">
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-cart-check fs-2"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">Total Orders</h5>
                        <p class="card-text h3 mb-0">{{ $totalOrdersToday ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-currency-dollar fs-2"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">Total Sales</h5>
                        <p class="card-text h3 mb-0">
                            ₱{{ number_format($totalSalesToday ?? 0, 2) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
