@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Title -->
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold">Hungry? We've Got You Covered! <span class="text-primary">🍽️</span></h1>
        <p class="text-muted">Delicious meals, quick snacks, and refreshing drinks - all in one place</p>
    </div>
  
    <div class="row g-4">
        <!-- Sidebar: Categories -->
        <div class="col-lg-3 col-md-4">
            <!-- Categories Card -->
            <div class="card shadow border-0 rounded-3 mb-4 hover-lift">
                <div class="card-header bg-gradient-light py-3">
                    <h2 class="fs-4 mb-0 fw-bold"><i class="bi bi-grid-3x3-gap-fill me-2 text-primary"></i>Categories</h2>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush rounded-bottom">
                        <a href="{{ route('menu.category', 'breakfast') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 px-4 border-start-0 border-end-0">
                            <i class="bi bi-sunrise fs-5 me-3 text-warning"></i>
                            <span>Breakfast</span>
                            <i class="bi bi-chevron-right ms-auto text-muted"></i>
                        </a>
                        <a href="{{ route('menu.category', 'lunch') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 px-4 border-start-0 border-end-0">
                            <i class="bi bi-egg-fried fs-5 me-3 text-danger"></i>
                            <span>Lunch</span>
                            <i class="bi bi-chevron-right ms-auto text-muted"></i>
                        </a>
                        <a href="{{ route('menu.category', 'snacks') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 px-4 border-start-0 border-end-0">
                            <i class="bi bi-cup-straw fs-5 me-3 text-success"></i>
                            <span>Snacks</span>
                            <i class="bi bi-chevron-right ms-auto text-muted"></i>
                        </a>
                        <a href="{{ route('menu.category', 'cup noodles') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 px-4 border-start-0 border-end-0">
                            <i class="bi bi-cup-hot fs-5 me-3 text-danger"></i>
                            <span>Cup Noodles</span>
                            <i class="bi bi-chevron-right ms-auto text-muted"></i>
                        </a>
                        <a href="{{ route('menu.category', 'drinks') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 px-4 border-start-0 border-end-0">
                            <i class="bi bi-cup fs-5 me-3 text-info"></i>
                            <span>Drinks</span>
                            <i class="bi bi-chevron-right ms-auto text-muted"></i>
                        </a>
                        <a href="{{ route('menu.category', 'biscuits') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 px-4 border-start-0 border-end-0">
    <span class="me-3 text-warning">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cookie" viewBox="0 0 16 16">
            <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32.173 1.87-.523 1.77-.322 1.82-1.32 1.36-1.061 1.303-1.658.902L8 15l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32-.173-1.87.523-1.77.322-1.82 1.32-1.36 1.061-1.303L7.33 1.064 8 0z"/>
            <path d="M8 2.5c2.472 0 4.5 2.028 4.5 4.5 0 1.901-1.062 3.546-2.645 4.397a.5.5 0 0 1-.686-.216.5.5 0 0 1 .216-.686C10.795 9.941 11.5 8.76 11.5 7c0-1.933-1.567-3.5-3.5-3.5S4.5 5.067 4.5 7a3.5 3.5 0 0 0 1.852 3.087A.5.5 0 0 1 6 10.5a.5.5 0 0 1-.23-.416C4.70 9.234 4 8.202 4 7c0-2.472 2.028-4.5 4.5-4.5z"/>
        </svg>
    </span>
    <span>Biscuits</span>
    <i class="bi bi-chevron-right ms-auto text-muted"></i>
</a>
                        <a href="{{ route('menu.category', 'junk foods') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 px-4 border-start-0 border-end-0">
                            <i class="bi bi-bag-check fs-5 me-3 text-primary"></i>
                            <span>Junk Foods</span>
                            <i class="bi bi-chevron-right ms-auto text-muted"></i>
                        </a>
                        <a href="{{ route('menu.category', 'chocolates') }}" class="list-group-item list-group-item-action d-flex align-items-center py-3 px-4 border-start-0 border-end-0">
                            <i class="bi bi-heart fs-5 me-3 text-danger"></i>
                            <span>Chocolates</span>
                            <i class="bi bi-chevron-right ms-auto text-muted"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Cart Summary -->
            <div class="card shadow border-0 rounded-3 hover-lift">
                <div class="card-header bg-gradient-light py-3 d-flex justify-content-between align-items-center">
                    <h3 class="fs-4 mb-0 fw-bold"><i class="bi bi-cart3 me-2 text-primary"></i>Your Cart</h3>
                    <span class="badge bg-primary rounded-pill">{{ session('order') ? count(session('order')) : 0 }}</span>
                </div>
                <div class="card-body">
                    @if(session('order'))
                        <div class="text-center mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Items:</span>
                                <span class="fw-bold">{{ count(session('order')) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Total:</span>
                                <span class="fw-bold fs-5 text-primary">₱{{ number_format($totalAmount ?? 0, 2) }}</span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary w-100 mb-2 py-2" data-bs-toggle="modal" data-bs-target="#orderModal">
                            <i class="bi bi-cart3 me-2"></i>View Cart
                        </button>
                        <a href="{{ route('order.checkout') }}" class="btn btn-success w-100 py-2">
                            <i class="bi bi-credit-card me-2"></i>Checkout
                        </a>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-cart-x fs-1 text-muted mb-3"></i>
                            <p class="text-muted mb-3">Your cart is empty</p>
                            <button type="button" class="btn btn-outline-primary rounded-pill px-4" disabled>
                                <i class="bi bi-cart3 me-2"></i>Add Items
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9 col-md-8">
            <div class="card shadow border-0 rounded-3 hover-lift">
                <div class="card-header bg-gradient-light py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Menu Title -->
                        <h2 class="fs-4 mb-0 fw-bold">
                            <a href="{{ url('/') }}" class="text-decoration-none">
                                <i class="bi bi-grid-3x3-gap-fill me-2 text-primary"></i>Menu
                            </a>
                        </h2>
                        
                        <!-- Search Bar -->
                        <form class="d-flex" action="{{ route('menu.search') }}" method="GET">
                            <div class="input-group">
                                <input id="search-input" class="form-control rounded-start" type="search" name="query" placeholder="Search for food items..." aria-label="Search">
                                <!-- <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button> -->
                                <button id="voice-search-btn" type="button" class="btn btn-outline-secondary rounded-end">
                                    <i class="bi bi-mic"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="card-body">
                    <!-- Menu Items -->
                    <div id="product-list" class="row g-4">
                        @if(isset($items) && !$items->isEmpty())
                            @foreach($items as $item)
                                <div class="col-xl-4 col-lg-6 col-sm-6 product-item" data-name="{{ $item->name }}">
                                    <div class="card h-100 border-0 shadow-sm hover-card overflow-hidden">
                                        <div class="position-relative">
                                            @if($item->quantity <= 0)
                                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background-color: rgba(0,0,0,0.5); z-index: 1; border-radius: 8px 8px 0 0;">
                                                    <span class="badge bg-danger px-3 py-2 fs-6">Out of Stock</span>
                                                </div>
                                            @endif
                                            
                                            <div class="position-relative overflow-hidden" style="height: 180px;">
                                                @if($item->image)
                                                    <img src="{{ asset('images/' . $item->image) }}" class="w-100 h-100 object-fit-cover" alt="{{ $item->name }}">
                                                @else
                                                    <img src="{{ asset('images/default.png') }}" class="w-100 h-100 object-fit-cover" alt="Default Image">
                                                @endif
                                                
                                                @if($item->quantity > 0)
                                                    <form action="{{ route('order.add') }}" method="POST" class="position-absolute bottom-0 end-0 m-2">
                                                        @csrf
                                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                                        <button type="submit" class="btn btn-primary btn-sm rounded-circle p-2" title="Add to cart">
                                                            <i class="bi bi-plus-lg"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="card-body d-flex flex-column p-3">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h5 class="card-title fw-bold mb-0 text-truncate">{{ $item->name }}</h5>
                                                <span class="badge bg-primary-subtle text-primary">{{ $item->category }}</span>
                                            </div>
                                            <p class="card-text text-muted small mb-3">{{ Str::limit($item->description ?? 'Delicious food item', 60) }}</p>
                                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                                <span class="fs-5 fw-bold text-primary">₱{{ number_format($item->price, 2) }}</span>
                                                
                                                @if($item->quantity > 0)
                                                    <div class="d-flex align-items-center">
                                                        <span class="me-2 small text-success"><i class="bi bi-check-circle me-1"></i>In Stock</span>
                                                    </div>
                                                @else
                                                    <span class="text-danger small"><i class="bi bi-x-circle me-1"></i>Out of Stock</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center py-5">
                                <i class="bi bi-emoji-frown fs-1 text-muted mb-3"></i>
                                <h4 class="text-muted">No items found</h4>
                                <p class="text-muted mb-4">We couldn't find any items matching your criteria.</p>
                                <a href="{{ url('/') }}" class="btn btn-primary rounded-pill px-4">
                                    <i class="bi bi-grid me-2"></i>Browse All Items
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Pagination -->
                    <nav class="mt-5">
                        <ul id="pagination" class="pagination justify-content-center"></ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-gradient-light">
                <h5 class="modal-title fw-bold" id="orderModalLabel">
                    <i class="bi bi-cart3 me-2 text-primary"></i>Your Order
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
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
                                <tr>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <img <img src="{{ asset('images/default.png') }}" class="rounded" width="50" height="50" alt="{{ $details['name'] }}">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold">{{ $details['name'] }}</h6>
                                                <small class="text-muted">₱{{ number_format($details['price'], 2) }} each</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <form action="{{ route('order.update') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="item_id" value="{{ $id }}">
                                                <input type="hidden" name="quantity" value="{{ $details['quantity'] - 1 }}">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary rounded-circle p-1" {{ $details['quantity'] <= 1 ? 'disabled' : '' }}>
                                                    <i class="bi bi-dash"></i>
                                                </button>
                                            </form>
                                            <span class="mx-3 fw-bold">{{ $details['quantity'] }}</span>
                                            <form action="{{ route('order.update') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="item_id" value="{{ $id }}">
                                                <input type="hidden" name="quantity" value="{{ $details['quantity'] + 1 }}">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary rounded-circle p-1">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="text-end align-middle fw-bold">
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
                                    <td class="text-end fw-bold fs-5 text-primary">₱{{ number_format($totalAmount ?? 0, 2) }}</td>
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
                    <div class="text-center py-5">
                        <i class="bi bi-cart-x fs-1 text-muted mb-3"></i>
                        <h4>Your cart is empty</h4>
                        <p class="text-muted mb-4">Add some delicious items to your cart first!</p>
                        <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-dismiss="modal">
                            <i class="bi bi-bag-plus me-2"></i>Start Shopping
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Add this at the end of your file -->
<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .hover-lift {
        transition: transform 0.3s ease;
    }
    
    .hover-lift:hover {
        transform: translateY(-3px);
    }
    
    .bg-gradient-light {
        background: linear-gradient(to right, #f8f9fa, #ffffff);
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    
    .object-fit-cover {
        object-fit: cover;
    }

    /* Animation for badges */
    .badge {
        transition: all 0.3s ease;
    }
    
    .badge:hover {
        transform: scale(1.1);
    }
    
    /* Improve card design */
    .card {
        border-radius: 12px;
        overflow: hidden;
    }
    
    /* Custom styling for "Out of Stock" overlay */
    .position-absolute.top-0 {
        backdrop-filter: blur(2px);
    }
</style>

<script>
    // Confirm delete function
    function confirmDelete(event, form) {
        event.preventDefault();
        if (confirm('Are you sure you want to remove this item from your cart?')) {
            form.submit();
        }
    }

    // Voice search functionality
    document.addEventListener('DOMContentLoaded', function() {
        const voiceSearchBtn = document.getElementById('voice-search-btn');
        const searchInput = document.getElementById('search-input');
        
        if (voiceSearchBtn && 'webkitSpeechRecognition' in window) {
            const recognition = new webkitSpeechRecognition();
            recognition.continuous = false;
            recognition.interimResults = false;
            recognition.lang = 'en-US';
            
            recognition.onresult = function(event) {
                const transcript = event.results[0][0].transcript;
                searchInput.value = transcript;
                searchInput.form.submit();
            };
            
            voiceSearchBtn.addEventListener('click', function() {
                recognition.start();
                voiceSearchBtn.innerHTML = '<i class="bi bi-mic-fill text-danger"></i>';
                setTimeout(() => {
                    voiceSearchBtn.innerHTML = '<i class="bi bi-mic"></i>';
                }, 3000);
            });
        } else if (voiceSearchBtn) {
            voiceSearchBtn.style.display = 'none';
        }
    });
</script>
<script>
// Voice search script
document.addEventListener("DOMContentLoaded", function () {
    const voiceSearchBtn = document.getElementById("voice-search-btn");
    const searchInput = document.getElementById("search-input");
    const items = document.querySelectorAll(".product-item");
    
    // Category routes mapping
    const categoryRoutes = {
        "breakfast": "{{ route('menu.category', 'breakfast') }}",
        "lunch": "{{ route('menu.category', 'lunch') }}",
        "snacks": "{{ route('menu.category', 'snacks') }}",
        "cup noodles": "{{ route('menu.category', 'cup noodles') }}",
        "drinks": "{{ route('menu.category', 'drinks') }}",
        "biscuits": "{{ route('menu.category', 'biscuits') }}",
        "junk foods": "{{ route('menu.category', 'junk foods') }}",
        "chocolates": "{{ route('menu.category', 'chocolates') }}"
    };
    
    // Custom keyword mapping
    const customKeywordMap = {
        "choco nuts": "choco knots",
        "choco nots": "choco knots",
        "choco knots": "choco knots"
    };
    
    // Check if browser supports speech recognition
    if ("webkitSpeechRecognition" in window) {
        const recognition = new webkitSpeechRecognition();
        recognition.lang = "en-US";
        recognition.interimResults = false;
        
        // Start voice recognition on button click
        voiceSearchBtn.addEventListener("click", () => {
            // Visual feedback that voice recognition is active
            voiceSearchBtn.classList.add('btn-danger');
            voiceSearchBtn.innerHTML = '<i class="bi bi-mic-fill"></i>';
            recognition.start();
        });
        
        // Process recognition result
        recognition.onresult = event => {
            let query = event.results[0][0].transcript.toLowerCase();
            searchInput.value = query;
            
            // Reset button appearance
            voiceSearchBtn.classList.remove('btn-danger');
            voiceSearchBtn.innerHTML = '<i class="bi bi-mic"></i>';
            
            // Check for custom keyword mapping
            if (customKeywordMap[query]) {
                query = customKeywordMap[query];
            }
            
            // Check if query matches a category
            if (categoryRoutes[query]) {
                window.location.href = categoryRoutes[query];
            } else {
                filterProducts(query);
            }
        };
        
        // Handle recognition errors
        recognition.onerror = event => {
            console.error("Voice search error:", event.error);
            voiceSearchBtn.classList.remove('btn-danger');
            voiceSearchBtn.innerHTML = '<i class="bi bi-mic"></i>';
            
            // Show error toast
            const toastContainer = document.createElement('div');
            toastContainer.className = 'position-fixed bottom-0 end-0 p-3';
            toastContainer.style.zIndex = '5';
            toastContainer.innerHTML = `
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Error</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Voice recognition failed: ${event.error}
                    </div>
                </div>
            `;
            document.body.appendChild(toastContainer);
            
            const toastEl = document.querySelector('.toast');
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        };
        
        // On recognition end
        recognition.onend = () => {
            voiceSearchBtn.classList.remove('btn-danger');
            voiceSearchBtn.innerHTML = '<i class="bi bi-mic"></i>';
        };
    } else {
        voiceSearchBtn.disabled = true;
        voiceSearchBtn.title = "Voice search not supported in this browser";
    }
    
    // Filter products function
    function filterProducts(query) {
        query = normalizeText(query);
        const queryKeywords = query.split(" ");
        let resultsFound = false;
        
        items.forEach(item => {
            const name = normalizeText(item.getAttribute("data-name"));
            const isMatch = queryKeywords.every(keyword => fuzzyMatch(name, keyword));
            
            if (isMatch) {
                item.style.display = "";
                resultsFound = true;
            } else {
                item.style.display = "none";
            }
        });
        
        if (!resultsFound) {
            // Create a "No results" message if it doesn't exist
            if (!document.getElementById('no-results-message')) {
                const noResults = document.createElement('div');
                noResults.id = 'no-results-message';
                noResults.className = 'col-12 text-center py-4';
                noResults.innerHTML = `
                    <div class="alert alert-info">
                        <i class="bi bi-search me-2"></i>
                        No items match your search for "<strong>${query}</strong>"
                    </div>
                    <button class="btn btn-outline-primary mt-2" onclick="resetSearch()">
                        <i class="bi bi-arrow-repeat me-2"></i>Show All Items
                    </button>
                `;
                document.getElementById('product-list').appendChild(noResults);
            }
        } else {
            // Remove "No results" message if it exists
            const noResults = document.getElementById('no-results-message');
            if (noResults) {
                noResults.remove();
            }
        }
        
        // Update pagination
        updatePagination();
    }
    
    // Normalize text function
    function normalizeText(text) {
        return text
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, "")
            .replace(/-/g, " ")
            .trim();
    }
    
    // Fuzzy matching function
    function fuzzyMatch(name, keyword) {
        return name.includes(keyword) || 
               areStringsSimilar(name, keyword) || 
               soundexMatch(name, keyword);
    }
    
    // Simple Soundex implementation
    function soundex(str) {
        const a = str.toLowerCase().split('');
        const mappings = {
            a: '', e: '', i: '', o: '', u: '', y: '', h: '', w: '',
            b: 1, f: 1, p: 1, v: 1,
            c: 2, g: 2, j: 2, k: 2, q: 2, s: 2, x: 2, z: 2,
            d: 3, t: 3,
            l: 4,
            m: 5, n: 5,
            r: 6
        };
        
        const first = a[0];
        const r = a
            .slice(1)
            .map(v => mappings[v])
            .filter((v, i, a) => v !== a[i - 1] && v !== undefined);
        r.unshift(first);
        return (r[0] + r.slice(1).join('')).toUpperCase();
    }
    
    function soundexMatch(str1, str2) {
        return soundex(str1) === soundex(str2);
    }
    
    // Levenshtein distance for string similarity
    function levenshteinDistance(a, b) {
        if (a.length === 0) return b.length;
        if (b.length === 0) return a.length;
        
        const matrix = [];
        
        for (let i = 0; i <= b.length; i++) {
            matrix[i] = [i];
        }
        
        for (let j = 0; j <= a.length; j++) {
            matrix[0][j] = j;
        }
        
        for (let i = 1; i <= b.length; i++) {
            for (let j = 1; j <= a.length; j++) {
                const cost = a[j - 1] === b[i - 1] ? 0 : 1;
                matrix[i][j] = Math.min(
                    matrix[i - 1][j] + 1,
                    matrix[i][j - 1] + 1,
                    matrix[i - 1][j - 1] + cost
                );
            }
        }
        
        return matrix[b.length][a.length];
    }
    
    function areStringsSimilar(str1, str2) {
        return levenshteinDistance(str1, str2) <= 2;
    }
    
    // Reset search function (to be called from HTML)
    window.resetSearch = function() {
        searchInput.value = '';
        items.forEach(item => {
            item.style.display = '';
        });
        
        const noResults = document.getElementById('no-results-message');
        if (noResults) {
            noResults.remove();
        }
        
        updatePagination();
    };
    
    // Pagination script
    function updatePagination() {
        const visibleItems = Array.from(items).filter(item => 
            item.style.display !== 'none'
        );
        
        const perPage = 6;
        const totalVisibleItems = visibleItems.length;
        const totalPages = Math.ceil(totalVisibleItems / perPage);
        const paginationEl = document.getElementById('pagination');
        
        // Clear pagination
        paginationEl.innerHTML = '';
        
        // Don't show pagination if there are no results or only one page
        if (totalVisibleItems === 0 || totalPages <= 1) {
            return;
        }
        
        // Previous button
        const prevLi = document.createElement('li');
        prevLi.classList.add('page-item');
        prevLi.innerHTML = `
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        `;
        paginationEl.appendChild(prevLi);
        
        // Page numbers
        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.classList.add('page-item');
            if (i === 1) li.classList.add('active');
            
            const a = document.createElement('a');
            a.classList.add('page-link');
            a.href = '#';
            a.textContent = i;
            a.addEventListener('click', function(e) {
                e.preventDefault();
                showPage(i, visibleItems);
                document.querySelectorAll('#pagination .page-item').forEach(li => 
                    li.classList.remove('active')
                );
                li.classList.add('active');
            });
            
            li.appendChild(a);
            paginationEl.appendChild(li);
        }
        
        // Next button
        const nextLi = document.createElement('li');
        nextLi.classList.add('page-item');
        nextLi.innerHTML = `
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        `;
        paginationEl.appendChild(nextLi);
        
        // Show first page by default
        showPage(1, visibleItems);
    }
    
    function showPage(page, visibleItems) {
        const perPage = 6;
        const start = (page - 1) * perPage;
        const end = start + perPage;
        
        // Hide all items first
        items.forEach(item => {
            item.style.display = 'none';
        });
        
        // Show only the items for current page
        visibleItems.slice(start, end).forEach(item => {
            item.style.display = '';
        });
        
        // Smooth scroll to top of products
        document.getElementById('product-list').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
    
    // Initialize pagination on page load
    updatePagination();
});

// Alert dismissal
document.addEventListener('DOMContentLoaded', function () {
    const alert = document.querySelector('.alert-success');
    if (alert) {
        setTimeout(() => {
            alert.classList.remove('show');
            setTimeout(() => {
                alert.remove();
            }, 300);
        }, 3000);
    }
});

// Delete confirmation
function confirmDelete(event, form) {
    event.preventDefault();
    
    if (confirm("Are you sure you want to remove this item from your order?")) {
        form.submit();
    }
}
</script>
@endsection