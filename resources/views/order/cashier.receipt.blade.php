@extends('admin.dashboard')

@section('content')
<div class="container-fluid p-4" style="background-color: #f8f9fa; min-height: 100vh;">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Receipt</h5>
                </div>
                <div class="card-body">
                    <h5>Items:</h5>
                    <p>{{ $items }}</p>

                    <h5>Total Amount: ₱{{ number_format($totalAmount, 2) }}</h5>
                    <h5>Payment Received: ₱{{ number_format($paymentReceived, 2) }}</h5>
                    <h5>Change: ₱{{ number_format($change, 2) }}</h5>

                    <a href="{{ route('cashier.page') }}" class="btn btn-primary mt-4">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
