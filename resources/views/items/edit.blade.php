@extends('admin.dashboard')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Card Wrapper --}}
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Item</h4>
                </div>

                <div class="card-body">
                    {{-- Display Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Edit Form --}}
                    <form action="{{ route('items.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Product Name</label>
                            <input type="text" id="name" name="name" class="form-control rounded-3" 
                                   value="{{ old('name', $item->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label fw-semibold">Price (₱)</label>
                            <input type="number" id="price" name="price" class="form-control rounded-3" step="0.01"
                                   value="{{ old('price', $item->price) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label fw-semibold">Add Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="form-control rounded-3" 
                                   value="0" min="0" disabled>
                            <small class="text-muted">Enter the quantity to add to the current stock.</small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg me-2"></i>Update Item
                            </button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 12px;
        overflow: hidden;
    }
    .form-control {
        border-radius: 8px;
    }
</style>
@endsection
