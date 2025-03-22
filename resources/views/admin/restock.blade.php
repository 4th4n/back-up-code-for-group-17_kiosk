@extends('admin.dashboard')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h1 class="my-3">Restock Items</h1>
            
            <form action="{{ route('restock.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="item_id" class="form-label">Select Item</label>
                            <select name="item_id" id="item_id" class="form-control form-select" required>
                                <option value="" disabled selected>Choose an item</option>
                                @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} (Current Stock: {{ $item->quantity }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="quantity" class="form-label">Quantity to Add</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 mt-3">Restock</button>
                    </div>
                </div>
            </form>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>

    <!-- Inventory Tab Navigation -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="mb-3">Inventory Items</h2>
            
            <ul class="nav nav-tabs" id="inventoryTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-items-tab" data-bs-toggle="tab" data-bs-target="#all-items" type="button" role="tab">
                        All Items
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="low-stock-tab" data-bs-toggle="tab" data-bs-target="#low-stock" type="button" role="tab">
                        Low Stock
                        <span class="badge bg-warning text-dark ms-1">{{ $lowStockCount }}</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="out-of-stock-tab" data-bs-toggle="tab" data-bs-target="#out-of-stock" type="button" role="tab">
                        Out of Stock
                        <span class="badge bg-danger ms-1">{{ $outOfStockCount }}</span>
                    </button>
                </li>
            </ul>
            
            <div class="tab-content" id="inventoryTabContent">
                <!-- All Items Tab -->
                <div class="tab-pane fade show active" id="all-items" role="tabpanel">
                    <div class="table-responsive mt-3">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>₱{{ number_format($item->price, 2) }}</td>
                                    <td>
                                        @if ($item->quantity == 0)
                                            <span class="badge bg-danger">No Stock</span>
                                        @elseif ($item->quantity < $item->low_stock_level)
                                            <span class="badge bg-warning text-dark">Low Stock</span>
                                        @else
                                            <span class="badge bg-success">In Stock</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Low Stock Tab -->
                <div class="tab-pane fade" id="low-stock" role="tabpanel">
                    <div class="table-responsive mt-3">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Low Stock Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    @if($item->quantity > 0 && $item->quantity < $item->low_stock_level)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>₱{{ number_format($item->price, 2) }}</td>
                                        <td>{{ $item->low_stock_level }}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Out of Stock Tab -->
                <div class="tab-pane fade" id="out-of-stock" role="tabpanel">
                    <div class="table-responsive mt-3">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    @if($item->quantity == 0)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>₱{{ number_format($item->price, 2) }}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
