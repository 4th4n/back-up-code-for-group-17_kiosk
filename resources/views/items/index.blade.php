@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Product Inventory</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createItemModal">
                    <i class="bi bi-plus-lg me-2"></i> Add New Item
                </button>
            </div>
            
            @include('items.create')
            
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->stock }} {{ $item->unit }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>₱{{ number_format($item->price, 2) }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete(this)">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <h5 class="mt-3">No products found</h5>
                                            <p class="text-muted">Add your first product to get started</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Custom Styled Pagination --}}
            @if ($items->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    <nav>
                        <ul class="pagination">
                            {{-- Previous Page --}}
                            @if ($items->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">&larr;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $items->previousPageUrl() }}" aria-label="Previous">&larr;</a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($items->links()->elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                @endif

                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $items->currentPage())
                                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            {{-- Next Page --}}
                            @if ($items->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $items->nextPageUrl() }}" aria-label="Next">&rarr;</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">&rarr;</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this item? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete Item</button>
            </div>
        </div>
    </div>
</div>

<style>
    .table tbody tr:hover { background-color: #f8f9fa; }
    .pagination .page-item .page-link {
        border: none;
        border-radius: 6px;
        margin: 0 4px;
        color: #495057;
        padding: 8px 12px;
        transition: all 0.2s ease-in-out;
    }
    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: white;
    }
    .pagination .page-item .page-link:hover {
        background-color: #f1f3f5;
    }
</style>
<script>
// Function to check time and reset food quantities if needed
function checkTimeAndResetFood() {
    const now = new Date();
    const hours = now.getHours();
    const minutes = now.getMinutes();
    console.log(`Current time: ${hours}:${minutes}`);

    // FOR TESTING: Force reset regardless of time (comment out after testing)
    const forceReset = true;

    // Check if it's 4:00 PM (16:00) or if we're forcing reset for testing
    if ((hours === 16 && minutes === 0) || forceReset) {
        console.log('Condition met! Attempting to reset food quantities...');
        
        // Send AJAX request to reset food quantities
        fetch('{{ route("items.reset-food") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
            3
        })
        .then(response => {
            console.log('Response received:', response);
            return response.json();
        })
        .then(data => {
            console.log('Data received:', data);
            if (data.success) {
                console.log(data.message);
                // Success message logged, no alert, no page reload
                
                // Option: If you need to update the UI without page reload,
                // you could implement that here instead:
                // updateFoodQuantitiesDisplay();
            }
        })
        .catch(error => {
            console.error('Error resetting food quantities:', error);
        });
    }
}

// For testing - execute immediately
console.log('Script loaded, executing check...');
checkTimeAndResetFood();

// Set interval to check every minute (for normal operation)
setInterval(checkTimeAndResetFood, 60000);
</script>

<script>
    function confirmDelete(button) {
        const form = button.closest('form');
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
        document.getElementById('confirmDeleteBtn').onclick = function () { form.submit(); };
        deleteModal.show();
    }
</script>

@endsection