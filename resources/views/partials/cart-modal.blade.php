<div class="modal-body">
    @if(session('order'))
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Item</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-end">Price</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('order') as $id => $details)
                        @php
                            $item = \App\Models\Item::find($id);
                        @endphp
                    <tr>
                        <td class="align-middle">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img src="{{ asset('images/' . ($item->image ?? '1734142825.png')) }}" class="rounded" width="50" height="50" alt="{{ $details['name'] }}">
                                </div>

                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $details['name'] }}</h6>
                                    <small class="text-muted">₱{{ number_format($details['price'], 2) }} each</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <!-- Decrease Button -->
                                <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle p-1 update-qty-btn" 
                                    data-id="{{ $id }}" 
                                    data-action="decrease">
                                    <i class="bi bi-dash"></i>
                                </button>

                                <!-- Quantity Counter -->
                                <span class="mx-3 fw-bold" id="qty-{{ $id }}">{{ $details['quantity'] }}</span>

                                <!-- Increase Button -->
                                <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle p-1 update-qty-btn" 
                                    data-id="{{ $id }}" 
                                    data-action="increase">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </td>
                        <td class="text-end align-middle fw-bold" id="price-{{ $id }}">
                            ₱{{ number_format($details['price'] * $details['quantity'], 2) }}
                        </td>

                        <td class="text-center align-middle">
                            <form action="{{ route('order.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $id }}">
                                <button type="button" class="btn btn-sm btn-danger rounded-circle p-1" onclick="confirmDelete(event, this.form)" title="Remove item">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <td colspan="2" class="text-end fw-bold">Total:</td>
                        <td class="text-end fw-bold fs-5 text-primary" id="total-price">
                            ₱{{ number_format($totalAmount ?? 0, 2) }}
                        </td>

                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                <i class="bi bi-arrow-left me-2"></i>Continue Shopping
            </button>
            <a href="{{ route('order.checkout') }}" class="btn btn-success">
                <i class="bi bi-credit-card me-2"></i>Proceed to Checkout
            </a>
        </div>
    @else
        <!-- <div class="text-center py-5">
            <i class="bi bi-cart-x fs-1 text-muted mb-3"></i>
            <h4>Your cart is empty</h4>
            <p class="text-muted mb-4">Add some delicious items to your cart first!</p>
            <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-dismiss="modal">
                <i class="bi bi-bag-plus me-2"></i>Start Shopping
            </button>
        </div> -->
    @endif
</div>

