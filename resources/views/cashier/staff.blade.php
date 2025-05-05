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
                                        <th class="text-center">Actions</th>
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
                                            <td class="text-center">
                                                @if($order->is_ready ?? false)
                                                    <span class="badge bg-success py-2 px-3">
                                                        <i class="bi bi-check-circle-fill me-1"></i> Ready for Pickup
                                                    </span>
                                                @else
                                                    <button type="button" class="btn btn-primary ready-btn" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#readyModal" 
                                                            data-order-id="{{ $order->id }}"
                                                            data-order-number="{{ $order->order_number }}">
                                                        <i class="bi bi-bell-fill me-1"></i> Ready to Reserve
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="3" class="text-end fw-bold">Total Revenue:</td>
                                        <td class="text-end fw-bold text-success">₱{{ number_format($orders->sum('total_price'), 2) }}</td>
                                        <td></td>
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

<!-- Ready to Reserve Modal -->
<div class="modal fade" id="readyModal" tabindex="-1" aria-labelledby="readyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="readyModalLabel">
                    <i class="bi bi-bell-fill me-2"></i>Mark Order as Ready
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div class="mb-4">
                    <i class="bi bi-bag-check-fill text-primary" style="font-size: 3rem;"></i>
                </div>
                <h4 class="mb-3">Ready to Reserve</h4>
                <p class="mb-1">You are marking this order as ready for pickup:</p>
                <h3 class="mb-3 text-primary order-number-display"></h3>
                <p class="text-muted">This will notify the customer that their order is ready for pickup.</p>
                
                <!-- Form will not be submitted directly. AJAX will be used instead -->
                <form id="markAsReadyForm">
                    @csrf
                    <input type="hidden" name="order_id" id="orderIdInput">
                </form>
                
                <!-- Success message after AJAX completion -->
                <div id="readySuccessAlert" class="alert alert-success mt-3" style="display: none;">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Order marked as ready successfully!
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg me-1"></i> Cancel
                </button>
                <button type="button" id="confirmReadyBtn" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> Confirm Readyyyyyyyyyyyyyyyyyyy
                </button>
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
    
    /* Ready button styles */
    .ready-btn {
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .ready-btn:hover {
        background-color: #3651d1;
    }
    
    .modal-content {
        border: none;
        border-radius: 12px;
        overflow: hidden;
    }
    
    /* Loading spinner styles */
    .spinner-border {
        width: 1.5rem;
        height: 1.5rem;
    }
</style>

{{-- JavaScript for Ready to Reserve functionality with AJAX --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all ready buttons
        const readyButtons = document.querySelectorAll('.ready-btn');
        const confirmReadyBtn = document.getElementById('confirmReadyBtn');
        const modal = document.getElementById('readyModal');
        const modalInstance = new bootstrap.Modal(modal);
        
        // Add click event to each button
        readyButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Get order details from data attributes
                const orderId = this.getAttribute('data-order-id');
                const orderNumber = this.getAttribute('data-order-number');
                
                // Set values in the modal
                document.getElementById('orderIdInput').value = orderId;
                document.querySelector('.order-number-display').textContent = orderNumber;
                
                // Hide success message when opening modal
                document.getElementById('readySuccessAlert').style.display = 'none';
            });
        });
        
        // Add click event to confirm button
        confirmReadyBtn.addEventListener('click', function() {
            // Show loading state
            this.disabled = true;
            this.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Processing...';
            
            // Get form data
            const orderId = document.getElementById('orderIdInput').value;
            const token = document.querySelector('input[name="_token"]').value;
            
            // Make AJAX request
            fetch("{{ route('cashier.markOrderReady') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    order_id: orderId
                })
            })
            .then(response => response.json())
            .then(data => {
                // Show success message
                document.getElementById('readySuccessAlert').style.display = 'block';
                
                // Reset button state
                confirmReadyBtn.disabled = false;
                confirmReadyBtn.innerHTML = '<i class="bi bi-check-lg me-1"></i> Confirm Ready';
                
                // Update UI to show order is ready
                const targetRow = document.querySelector(`[data-order-id="${orderId}"]`).closest('tr');
                const actionCell = targetRow.querySelector('td:last-child');
                actionCell.innerHTML = `
                    <span class="badge bg-success py-2 px-3">
                        <i class="bi bi-check-circle-fill me-1"></i> Ready for Pickup
                    </span>
                `;
                
                // Close modal after short delay
                setTimeout(() => {
                    modalInstance.hide();
                }, 1500);
            })
            .catch(error => {
                console.error('Error:', error);
                // Reset button state
                confirmReadyBtn.disabled = false;
                confirmReadyBtn.innerHTML = '<i class="bi bi-check-lg me-1"></i> Confirm Ready';
                alert('An error occurred while marking the order as ready.');
            });
        });
    });
</script>
@endsection