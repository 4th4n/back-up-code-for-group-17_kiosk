@extends('admin.dashboard')

@section('content')
<div class="container my-5">
    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-4 text-center">List Orders</h1>

    @if($orders->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            No past orders found.
        </div>
    @else
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Order Details</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Order Number</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Items</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th> <!-- Added Action column for checkbox -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->order_number }}</td> <!-- Display Order Number -->
                                    <td>₱{{ number_format($order->total_price, 2) }} pesos</td>
                                    <td>
                                        <ul class="list-unstyled mb-0">
                                            @foreach($order->items as $item)
                                                <li>{{ $item->name }} ({{ $item->pivot->quantity }} pcs)</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $order->created_at->timezone('Asia/Manila')->format('F j, Y g:i A') }}</td>

                                    <!-- Form to handle marking as completed -->
                                    <td>
                                        <form action="{{ route('order.complete', $order->id) }}" method="POST" id="complete-form-{{ $order->id }}">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-check">
                                                <input type="checkbox" 
                                                       class="form-check-input" 
                                                       name="completed" 
                                                       id="completed_{{ $order->id }}"
                                                       {{ $order->completed ? 'checked' : '' }}
                                                       onchange="this.form.submit();">
                                                <label class="form-check-label" for="completed_{{ $order->id }}">
                                                    Mark as Completed
                                                </label>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
    @media print {
        button {
            display: none; /* Hide the Print button in print output */
        }
    }
</style>
@endsection
