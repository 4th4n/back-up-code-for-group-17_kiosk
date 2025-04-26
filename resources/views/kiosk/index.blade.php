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
                    <!-- Cart Badge that will show the number of items -->
                    <!-- <span id="cart-count-badge" class="badge bg-primary rounded-pill">{{ session('order') ? count(session('order')) : 0 }}</span> -->
                </div>
                <div class="card-body">
                    <div id="cart-content" class="{{ session('order') ? '' : 'd-none' }}">
                        <div class="text-center mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Items:</span>
                                <span id="item-count" class="fw-bold">{{ count(session('order') ?? []) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Total:</span>
                                <span id="cart-total" class="fw-bold fs-5 text-primary">₱{{ number_format($totalAmount ?? 0, 2) }}</span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary w-100 mb-2 py-2" data-bs-toggle="modal" data-bs-target="#orderModal">
                            <i class="bi bi-cart3 me-2"></i>View Cart
                        </button> 

                        <a href="{{ route('order.checkout') }}" class="btn btn-success w-100 py-2">
                            <i class="bi bi-credit-card me-2"></i>Checkout
                        </a>
                    </div>

                    <div id="cart-empty" class="text-center py-4 {{ session('order') ? 'd-none' : '' }}">
                        <i class="bi bi-cart-x fs-1 text-muted mb-3"></i>
                        <p class="text-muted mb-3">Your cart is empty</p>
                    </div>
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
                                                    <button 
                                                        type="button"
                                                        class="btn btn-primary btn-sm rounded-circle p-2 add-to-cart-btn position-absolute bottom-0 end-0 m-2"
                                                        data-id="{{ $item->id }}"
                                                        title="Add to cart">
                                                        <i class="bi bi-plus-lg"></i>
                                                    </button>
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
    <div class="modal-content rounded-3">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="orderModalLabel"><i class="bi bi-cart3 me-2"></i>Your Order</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       @include('partials.cart-modal')
      </div>
    </div>
  </div>
</div> 
<script>
  // Voice search functionality with wake word detection
document.addEventListener('DOMContentLoaded', function() {
    const voiceSearchBtn = document.getElementById('voice-search-btn');
    const searchInput = document.getElementById('search-input');
    const items = document.querySelectorAll(".product-item");
    
    // Set your wake word/phrase here
    const WAKE_WORD = "hey canteen";
    
    // Add data attributes for categories and prices if not already present
    items.forEach(item => {
        // Add data-category attribute if missing
        if (!item.hasAttribute('data-category')) {
            const categoryBadge = item.querySelector('.badge.bg-primary-subtle');
            if (categoryBadge) {
                item.setAttribute('data-category', categoryBadge.textContent.trim().toLowerCase());
            }
        }
        
        // Add data-price attribute if missing
        if (!item.hasAttribute('data-price')) {
            const priceElement = item.querySelector('.fs-5.fw-bold.text-primary');
            if (priceElement) {
                const priceText = priceElement.textContent.replace('₱', '').replace(',', '').trim();
                item.setAttribute('data-price', parseFloat(priceText));
            }
        }
    });

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

    const customKeywordMap = {
        "choco nuts": "choco knots",
        "choco nots": "choco knots",
        "choco knots": "choco knots",
        "wafelo": "wafello",
        "wafelow": "wafello",
        "waffelo": "wafello",
        "waffle o": "wafello",
        "best seller": "bestseller",
        "best sellers": "bestseller",
        "bestsellers": "bestseller",
        "cheapest": "cheapest",
        "most affordable": "cheapest",
        "most cheap": "cheapest",
        "lowest price": "cheapest"
    };

    if ("webkitSpeechRecognition" in window) {
        // Create a separate recognition instance for background listening
        const wakeWordRecognition = new webkitSpeechRecognition();
        wakeWordRecognition.continuous = true;
        wakeWordRecognition.interimResults = true;
        wakeWordRecognition.lang = "en-US";
        
        // Create the main recognition instance for actual searches
        const searchRecognition = new webkitSpeechRecognition();
        searchRecognition.lang = "en-US";
        searchRecognition.interimResults = false;
        
        // Variable to track if wake word was detected
        let wakeWordDetected = false;
        
        // Status indicator
        let statusIndicator = document.createElement('div');
        statusIndicator.className = 'position-fixed bottom-0 end-0 m-3 p-2 bg-light rounded-circle border border-primary';
        statusIndicator.style.width = '15px';
        statusIndicator.style.height = '15px';
        statusIndicator.style.display = 'none';
        document.body.appendChild(statusIndicator);
        
        // Start the background listener when the page loads
        startWakeWordDetection();
        
        // Function to start wake word detection
        function startWakeWordDetection() {
            wakeWordRecognition.start();
            statusIndicator.style.display = 'block';
            statusIndicator.style.backgroundColor = '#28a745'; // Green light to show listening
        }
        
        // Handle wake word recognition results
        wakeWordRecognition.onresult = function(event) {
            for (let i = event.resultIndex; i < event.results.length; i++) {
                const transcript = event.results[i][0].transcript.toLowerCase().trim();
                console.log("Heard: ", transcript);
                
                // Check if the wake word is in the transcript
                if (transcript.includes(WAKE_WORD) && !wakeWordDetected) {
                    console.log("Wake word detected!");
                    wakeWordDetected = true;
                    
                    // Visual feedback
                    voiceSearchBtn.classList.add('btn-danger');
                    voiceSearchBtn.innerHTML = '<i class="bi bi-mic-fill"></i>';
                    
                    // Stop wake word detection and start search recognition
                    wakeWordRecognition.stop();
                    statusIndicator.style.backgroundColor = '#dc3545'; // Red to show active search
                    
                    // Small delay to let the user finish their command
                    setTimeout(() => {
                        searchRecognition.start();
                    }, 500);
                    
                    // Show a toast notification
                    showToast("Listening for your search query...");
                    break;
                }
            }
        };
        
        // Handle wake word recognition ending
        wakeWordRecognition.onend = function() {
            // Only restart if wake word was not detected
            if (!wakeWordDetected) {
                console.log("Wake word recognition ended, restarting...");
                startWakeWordDetection();
            }
        };
        
        // Handle wake word recognition errors
        wakeWordRecognition.onerror = function(event) {
            console.error("Wake word recognition error:", event.error);
            // Try to restart after error
            setTimeout(() => {
                if (!wakeWordDetected) {
                    startWakeWordDetection();
                }
            }, 2000);
        };
        
        // Handle normal search recognition results
        searchRecognition.onresult = event => {
            let query = event.results[0][0].transcript.toLowerCase();
            searchInput.value = query;

            voiceSearchBtn.classList.remove('btn-danger');
            voiceSearchBtn.innerHTML = '<i class="bi bi-mic"></i>';

            // Check for known keywords before other processing
            if (customKeywordMap[query]) {
                query = customKeywordMap[query];
            }

            let categoryFound = null;
            let priceLimit = null;
            let isBestSeller = false;
            let isCheapest = false;

            // Check for bestseller query
            if (query.includes('bestseller') || query.includes('best seller')) {
                isBestSeller = true;
            }

            // Check for cheapest query
            if (query.includes('cheapest') || query.includes('lowest price') || 
                query.includes('most affordable') || query.includes('most cheap')) {
                isCheapest = true;
            }

            // Check for category
            for (const key in categoryRoutes) {
                if (query.includes(key)) {
                    categoryFound = key;
                    break;
                }
            }

            // Check for price limits - improved pattern matching
            const belowPriceMatch = query.match(/(?:below|under|less than)\s+(\d+)\s*(?:pesos)?/);
            if (belowPriceMatch) {
                priceLimit = parseFloat(belowPriceMatch[1]);
            }

            // Handle best seller filter
            if (isBestSeller) {
                filterBestSellers(categoryFound);
                return;
            }

            // Handle cheapest filter
            if (isCheapest) {
                filterCheapest(categoryFound);
                return;
            }

            // Handle category AND price filter
            if (categoryFound && priceLimit !== null) {
                filterCategoryAndPrice(categoryFound, priceLimit);
                return;
            }

            // Handle just category
            if (categoryFound && !priceLimit) {
                filterByCategory(categoryFound);
                return;
            }

            // Handle just price
            if (priceLimit !== null) {
                filterByPrice(priceLimit);
                return;
            }

            // Default to regular search
            filterProducts(query);
        };
        
        // Handle search recognition ending
        searchRecognition.onend = () => {
            voiceSearchBtn.classList.remove('btn-danger');
            voiceSearchBtn.innerHTML = '<i class="bi bi-mic"></i>';
            statusIndicator.style.backgroundColor = '#28a745'; // Back to green
            
            // Reset the wake word detection flag
            wakeWordDetected = false;
            
            // Restart the wake word detection
            startWakeWordDetection();
        };
        
        // Handle search recognition errors
        searchRecognition.onerror = event => {
            console.error("Voice search error:", event.error);
            voiceSearchBtn.classList.remove('btn-danger');
            voiceSearchBtn.innerHTML = '<i class="bi bi-mic"></i>';
            showToast(`Voice recognition failed: ${event.error}`);
            
            // Reset and restart wake word detection
            wakeWordDetected = false;
            startWakeWordDetection();
        };
        
        // Keep the manual button functionality as a backup
        voiceSearchBtn.addEventListener("click", () => {
            // Stop wake word detection temporarily
            wakeWordRecognition.stop();
            wakeWordDetected = true;
            
            // Visual feedback
            voiceSearchBtn.classList.add('btn-danger');
            voiceSearchBtn.innerHTML = '<i class="bi bi-mic-fill"></i>';
            statusIndicator.style.backgroundColor = '#dc3545'; // Red to show active search
            
            // Start search recognition
            searchRecognition.start();
        });
        
    } else {
        voiceSearchBtn.disabled = true;
        voiceSearchBtn.title = "Voice search not supported in this browser";
    }
    
    // Helper function to show toast notifications
    function showToast(message) {
        const toastContainer = document.createElement('div');
        toastContainer.className = 'position-fixed bottom-0 start-50 translate-middle-x p-3';
        toastContainer.style.zIndex = '5';
        toastContainer.innerHTML = `
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Voice Search</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    ${message}
                </div>
            </div>
        `;
        document.body.appendChild(toastContainer);
        
        // Auto-remove after 3 seconds
        setTimeout(() => {
            toastContainer.remove();
        }, 3000);
    }
    
    // Filter items by category only
    function filterByCategory(category) {
        console.log(`Filtering items in category: ${category}`);
        
        let resultsFound = false;
        
        items.forEach(item => {
            const itemCategory = getItemCategory(item);
            
            if (itemCategory === category) {
                item.style.display = '';
                resultsFound = true;
            } else {
                item.style.display = 'none';
            }
        });
        
        // Remove existing filter headers and messages
        clearFilterMessages();
        
        // Add a header indicating the category filter
        if (resultsFound) {
            const filterHeader = document.createElement('div');
            filterHeader.id = 'category-filter-header';
            filterHeader.className = 'col-12 mb-3';
            filterHeader.innerHTML = `
                <div class="alert alert-info">
                    <i class="bi bi-filter me-2"></i>
                    <strong>${category.charAt(0).toUpperCase() + category.slice(1)} items</strong>
                    <button class="btn btn-sm btn-outline-info float-end" onclick="resetSearch()">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            `;
            document.getElementById('product-list').prepend(filterHeader);
        } else {
            // Show no results message
            showNoResultsMessage(`No items found in ${category} category`);
        }
        
        updatePagination();
    }

    // Filter items by both category and price
    function filterCategoryAndPrice(category, priceLimit) {
        console.log(`Filtering ${category} items below ${priceLimit} pesos`);
        
        let resultsFound = false;
        
        // Hide all items first
        items.forEach(item => {
            const price = getItemPrice(item);
            const itemCategory = getItemCategory(item);
            
            if (itemCategory === category && price < priceLimit) {
                item.style.display = '';
                resultsFound = true;
            } else {
                item.style.display = 'none';
            }
        });
        
        // Remove existing filter headers and messages
        clearFilterMessages();
        
        // Add a header indicating the combined filter
        if (resultsFound) {
            const filterHeader = document.createElement('div');
            filterHeader.id = 'category-price-filter-header';
            filterHeader.className = 'col-12 mb-3';
            filterHeader.innerHTML = `
                <div class="alert alert-info">
                    <i class="bi bi-funnel me-2"></i>
                    <strong>${category.charAt(0).toUpperCase() + category.slice(1)} under ${priceLimit} pesos</strong>
                    <button class="btn btn-sm btn-outline-info float-end" onclick="resetSearch()">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            `;
            document.getElementById('product-list').prepend(filterHeader);
        } else {
            // Show no results message
            showNoResultsMessage(`No ${category} items found under ${priceLimit} pesos`);
        }
        
        updatePagination();
    }
    
    // Filter items by price only
    function filterByPrice(priceLimit) {
        console.log(`Filtering all items below ${priceLimit} pesos`);
        
        let resultsFound = false;
        
        items.forEach(item => {
            const price = getItemPrice(item);
            
            if (price < priceLimit) {
                item.style.display = '';
                resultsFound = true;
            } else {
                item.style.display = 'none';
            }
        });
        
        // Remove existing filter headers and messages
        clearFilterMessages();
        
        // Add a header indicating the price filter
        if (resultsFound) {
            const filterHeader = document.createElement('div');
            filterHeader.id = 'price-filter-header';
            filterHeader.className = 'col-12 mb-3';
            filterHeader.innerHTML = `
                <div class="alert alert-info">
                    <i class="bi bi-tag-fill me-2"></i>
                    <strong>All items under ${priceLimit} pesos</strong>
                    <button class="btn btn-sm btn-outline-info float-end" onclick="resetSearch()">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            `;
            document.getElementById('product-list').prepend(filterHeader);
        } else {
            // Show no results message
            showNoResultsMessage(`No items found under ${priceLimit} pesos`);
        }
        
        updatePagination();
    }

    // Filter products by name
    function filterProducts(query) {
        query = normalizeText(query);
        const queryKeywords = query.split(" ");
        let resultsFound = false;

        items.forEach(item => {
            const name = getItemName(item);
            const normalizedName = normalizeText(name);
            const isMatch = queryKeywords.every(keyword => fuzzyMatch(normalizedName, keyword));

            if (isMatch) {
                item.style.display = "";
                resultsFound = true;
            } else {
                item.style.display = "none";
            }
        });

        // Remove existing filter headers and messages
        clearFilterMessages();

        if (!resultsFound) {
            showNoResultsMessage(`No items match your search for "${query}"`);
        }

        updatePagination();
    }

    // Filter bestsellers
    function filterBestSellers(category = null) {
        console.log("Filtering bestsellers for category:", category);
        
        // Get all items sorted by sales count (highest first)
        const itemsArray = Array.from(items);
        itemsArray.sort((a, b) => {
            // Use a pseudo-random value based on item name for demo purposes
            const aName = getItemName(a);
            const bName = getItemName(b);
            return aName.length - bName.length; // Just a demo sorting criterion
        });

        // Hide all items first
        items.forEach(item => item.style.display = 'none');

        // Filter by category if specified
        let filteredItems = itemsArray;
        if (category) {
            filteredItems = itemsArray.filter(item => {
                const itemCategory = getItemCategory(item);
                return itemCategory === category;
            });
        }

        // Show top 6 bestsellers (or all if less than 6)
        const topSellers = filteredItems.slice(0, 6);
        
        // Clear existing filters
        clearFilterMessages();
        
        if (topSellers.length > 0) {
            topSellers.forEach(item => item.style.display = '');
            
            // Add a "Best Seller" badge to these items
            topSellers.forEach(item => {
                const imgContainer = item.querySelector('.position-relative.overflow-hidden');
                if (imgContainer) {
                    // Check if badge already exists
                    if (!imgContainer.querySelector('.bestseller-badge')) {
                        const badge = document.createElement('div');
                        badge.className = 'position-absolute top-0 start-0 m-2 bestseller-badge';
                        badge.innerHTML = '<span class="badge bg-success px-2 py-1"><i class="bi bi-star-fill me-1"></i>Best Seller</span>';
                        imgContainer.appendChild(badge);
                    }
                }
            });
            
            // Add a header indicating the filter
            const newFilterHeader = document.createElement('div');
            newFilterHeader.id = 'bestseller-filter-header';
            newFilterHeader.className = 'col-12 mb-3';
            newFilterHeader.innerHTML = `
                <div class="alert alert-success">
                    <i class="bi bi-trophy me-2"></i>
                    <strong>Best Sellers${category ? ' in ' + category.charAt(0).toUpperCase() + category.slice(1) : ''}</strong>
                    <button class="btn btn-sm btn-outline-success float-end" onclick="resetSearch()">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            `;
            document.getElementById('product-list').prepend(newFilterHeader);
        } else {
            // Show no results message
            showNoResultsMessage(`No bestsellers found${category ? ' in ' + category.charAt(0).toUpperCase() + category.slice(1) : ''}`);
        }

        updatePagination();
    }

    // Filter cheapest items
    function filterCheapest(category = null) {
        console.log("Filtering cheapest items for category:", category);
        
        // Get all items sorted by price (lowest first)
        const itemsArray = Array.from(items);
        itemsArray.sort((a, b) => {
            const aPrice = getItemPrice(a);
            const bPrice = getItemPrice(b);
            return aPrice - bPrice; // Ascending order
        });

        // Hide all items first
        items.forEach(item => item.style.display = 'none');

        // Filter by category if specified
        let filteredItems = itemsArray;
        if (category) {
            filteredItems = itemsArray.filter(item => {
                const itemCategory = getItemCategory(item);
                return itemCategory === category;
            });
        }

        // Show top 6 cheapest (or all if less than 6)
        const cheapestItems = filteredItems.slice(0, 6);
        
        // Clear existing filters
        clearFilterMessages();
        
        if (cheapestItems.length > 0) {
            cheapestItems.forEach(item => item.style.display = '');
            
            // Add a "Best Value" badge to these items
            cheapestItems.forEach(item => {
                const imgContainer = item.querySelector('.position-relative.overflow-hidden');
                if (imgContainer) {
                    // Check if badge already exists
                    if (!imgContainer.querySelector('.cheapest-badge')) {
                        const badge = document.createElement('div');
                        badge.className = 'position-absolute top-0 start-0 m-2 cheapest-badge';
                        badge.innerHTML = '<span class="badge bg-warning text-dark px-2 py-1"><i class="bi bi-tag-fill me-1"></i>Best Value</span>';
                        imgContainer.appendChild(badge);
                    }
                }
            });
            
            // Add a header indicating the filter
            const newFilterHeader = document.createElement('div');
            newFilterHeader.id = 'cheapest-filter-header';
            newFilterHeader.className = 'col-12 mb-3';
            newFilterHeader.innerHTML = `
                <div class="alert alert-warning">
                    <i class="bi bi-tag me-2"></i>
                    <strong>Most Affordable Items${category ? ' in ' + category.charAt(0).toUpperCase() + category.slice(1) : ''}</strong>
                    <button class="btn btn-sm btn-outline-warning float-end" onclick="resetSearch()">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            `;
            document.getElementById('product-list').prepend(newFilterHeader);
        } else {
            // Show no results message
            showNoResultsMessage(`No items found${category ? ' in ' + category.charAt(0).toUpperCase() + category.slice(1) : ''}`);
        }

        updatePagination();
    }

    // Helper functions (no changes needed)
    function getItemCategory(item) {
        if (item.hasAttribute('data-category')) {
            return item.getAttribute('data-category').toLowerCase();
        }
        
        const categoryBadge = item.querySelector('.badge.bg-primary-subtle');
        if (categoryBadge) {
            return categoryBadge.textContent.trim().toLowerCase();
        }
        
        return '';
    }
    
    function getItemPrice(item) {
        if (item.hasAttribute('data-price')) {
            return parseFloat(item.getAttribute('data-price'));
        }
        
        const priceElement = item.querySelector('.fs-5.fw-bold.text-primary');
        if (priceElement) {
            const priceText = priceElement.textContent.replace('₱', '').replace(',', '').trim();
            return parseFloat(priceText);
        }
        
        return 9999; // Default high price if no price found
    }
    
    function getItemName(item) {
        if (item.hasAttribute('data-name')) {
            return item.getAttribute('data-name');
        }
        
        const nameElement = item.querySelector('.card-title');
        if (nameElement) {
            return nameElement.textContent.trim();
        }
        
        return '';
    }
    
    function clearFilterMessages() {
        const filterIds = [
            'no-results-message', 
            'bestseller-filter-header', 
            'cheapest-filter-header', 
            'category-price-filter-header',
            'price-filter-header',
            'category-filter-header'
        ];
        
        filterIds.forEach(id => {
            const element = document.getElementById(id);
            if (element) element.remove();
        });
        
        document.querySelectorAll('.bestseller-badge, .cheapest-badge').forEach(badge => {
            badge.remove();
        });
    }
    
    function showNoResultsMessage(message) {
        const div = document.createElement('div');
        div.id = 'no-results-message';
        div.className = 'col-12 text-center py-4';
        div.innerHTML = `
            <div class="alert alert-info">
                <i class="bi bi-search me-2"></i>
                ${message}
            </div>
            <button class="btn btn-outline-primary mt-2" onclick="resetSearch()">
                <i class="bi bi-arrow-repeat me-2"></i>Show All Items
            </button>
        `;
        document.getElementById('product-list').appendChild(div);
    }

    function normalizeText(text) {
        return text.toLowerCase().replace(/[^a-z0-9\s-]/g, "").replace(/-/g, " ").trim();
    }

    function fuzzyMatch(name, keyword) {
        return name.includes(keyword) ||
            areStringsSimilar(name, keyword) ||
            soundexMatch(name, keyword);
    }

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
        const r = a.slice(1)
            .map(v => mappings[v])
            .filter((v, i, a) => v !== a[i - 1] && v !== undefined);
        r.unshift(first);
        return (r[0] + r.slice(1).join('')).toUpperCase();
    }

    function soundexMatch(str1, str2) {
        return soundex(str1) === soundex(str2);
    }

    function levenshteinDistance(a, b) {
        if (a.length === 0) return b.length;
        if (b.length === 0) return a.length;

        const matrix = [];
        for (let i = 0; i <= b.length; i++) matrix[i] = [i];
        for (let j = 0; j <= a.length; j++) matrix[0][j] = j;

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

    function updatePagination() {
        const visibleItems = Array.from(items).filter(item => item.style.display !== 'none');
        const perPage = 6;
        const totalPages = Math.ceil(visibleItems.length / perPage);
        const paginationEl = document.getElementById('pagination');
        
        if (!paginationEl) return;

        paginationEl.innerHTML = '';
        if (visibleItems.length === 0 || totalPages <= 1) return;

        const prevLi = document.createElement('li');
        prevLi.classList.add('page-item');
        prevLi.innerHTML = `
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>`;
        paginationEl.appendChild(prevLi);

        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.classList.add('page-item');
            if (i === 1) li.classList.add('active');

            const a = document.createElement('a');
            a.classList.add('page-link');
            a.href = '#';
            a.textContent = i;
            a.addEventListener('click', function (e) {
                e.preventDefault();
                showPage(i, visibleItems);
                document.querySelectorAll('#pagination .page-item').forEach(li => li.classList.remove('active'));
                li.classList.add('active');
            });

            li.appendChild(a);
            paginationEl.appendChild(li);
        }

        const nextLi = document.createElement('li');
        nextLi.classList.add('page-item');
        nextLi.innerHTML = `
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>`;
        paginationEl.appendChild(nextLi);

        showPage(1, visibleItems);
    }

    function showPage(page, visibleItems) {
        const perPage = 6;
        const start = (page - 1) * perPage;
        const end = start + perPage;

        items.forEach(item => item.style.display = 'none');
        visibleItems.slice(start, end).forEach(item => item.style.display = '');

        document.getElementById('product-list').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    updatePagination();
});

// Move resetSearch to global scope so it can be called from inline onclick events
function resetSearch() {
    const searchInput = document.getElementById('search-input');
    if (searchInput) searchInput.value = '';
    
    document.querySelectorAll(".product-item").forEach(item => item.style.display = '');
    
    // Remove best seller and cheapest badges
    document.querySelectorAll('.bestseller-badge, .cheapest-badge').forEach(badge => {
        badge.remove();
    });
    
    // Remove any filter headers
    const filterIds = [
        'no-results-message', 
        'bestseller-filter-header', 
        'cheapest-filter-header', 
        'category-price-filter-header',
        'price-filter-header',
        'category-filter-header'
    ];
    
    filterIds.forEach(id => {
        const element = document.getElementById(id);
        if (element) element.remove();
    });
    
    // Update pagination
    if (typeof updatePagination === 'function') {
        updatePagination();
    } else {
        // Fallback: reload the page
        location.reload();
    }
}

// Auto-dismiss success alert
document.addEventListener('DOMContentLoaded', function () {
    const alert = document.querySelector('.alert-success');
    if (alert) {
        setTimeout(() => {
            alert.classList.remove('show');
            setTimeout(() => alert.remove(), 300);
        },3000);
    }
});

</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const viewCartBtn = document.querySelector('[data-bs-target="#orderModal"]');

    if (viewCartBtn) {
        viewCartBtn.addEventListener('click', function () {
            fetch("{{ route('cart.view') }}")
                .then(response => response.text())
                .then(html => {
                    const modalBody = document.querySelector('#orderModal .modal-body');
                    modalBody.innerHTML = html;
                })
                .catch(error => {
                    console.error('❌ Error loading cart modal:', error);
                });
        });
    }
});
</script>

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
  document.querySelectorAll('form[action="{{ route('order.add') }}"]').forEach(function(form) {
    form.addEventListener('submit', function () {
      setTimeout(() => {
        window.location.reload(); // reloads page after form submit
      }, 500);
    });
  });
</script>


<script>

    // After successful item addition or quantity update

    // Confirm delete function
    function confirmDelete(event, form) {
        event.preventDefault();
        if (confirm('Are you sure you want to remove this item from your cart?')) {
            form.submit();
        }
    }

 
    document.addEventListener('click', function (event) {
    if (event.target.closest('.update-qty-btn')) {
        const button = event.target.closest('.update-qty-btn');
        const itemId = button.dataset.id;
        const action = button.dataset.action;

        fetch("{{ route('order.update') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                item_id: itemId,
                action: action
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Update quantity in modal
                const qtyElement = document.querySelector(`#qty-${itemId}`);
                if (qtyElement) qtyElement.textContent = data.quantity;

                // Update item total price in modal
                const priceElement = document.querySelector(`#price-${itemId}`);
                if (priceElement) priceElement.textContent = `₱${data.item_total.toFixed(2)}`;

                // Update modal total
                const modalTotal = document.querySelector(`#total-price`);
                if (modalTotal) modalTotal.textContent = `₱${data.total.toFixed(2)}`;

                // 🔥 Update the cart summary total too!
                const cartTotal = document.querySelector(`#cart-total`);
                if (cartTotal) cartTotal.textContent = `₱${data.total.toFixed(2)}`;

                console.log("✅ Both modal and sidebar total updated.");
            } else {
                console.warn("⚠️ Failed to update item:", data.message);
            }
        })
        .catch(error => {
            console.error('❌ Request failed:', error);
        });
    }
});

// ADD ORDER
document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function () {
            const itemId = this.dataset.id;

            fetch('{{ route('order.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    item_id: itemId
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const cartCount = document.querySelector('#cart-count');
                    if (cartCount) {
                        cartCount.textContent = data.cart_count ?? 0;
                    }

                    const itemCount = document.querySelector('#item-count');
                    if (itemCount) {
                        itemCount.textContent = data.cart_count ?? 0;
                    }

                    const cartTotal = document.querySelector('#cart-total');
                    if (cartTotal) {
                        cartTotal.textContent = `₱${parseFloat(data.total).toFixed(2)}`;
                    }

                    const cartContent = document.querySelector('#cart-content');
                    const cartEmpty = document.querySelector('#cart-empty');
                    if (data.cart_count > 0) {
                        cartContent?.classList.remove('d-none');
                        cartEmpty?.classList.add('d-none');
                    } else {
                        cartContent?.classList.add('d-none');
                        cartEmpty?.classList.remove('d-none');
                    }

                    console.log(`✅ ${data.message}`);
                } else {
                    console.warn(`⚠️ ${data.message}`);
                }
            })
            .catch(error => {
                console.error('❌ Error adding to cart:', error);
            });
        });
    });
});

</script>
<script>

// Delete confirmation
function confirmDelete(event, form) {
    event.preventDefault();
    
    if (confirm("Are you sure you want to remove this item from your order?")) {
        form.submit();
    }
}
</script>

<style>
    
/* Make the voice search icon bigger */
#voice-search-btn i.bi {
  font-size: 1.5rem; /* Increase this value to make the icon even bigger */
}

/* Ensure the button size adjusts to fit the larger icon */
#voice-search-btn {
  padding: 0.375rem 0.75rem;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
@endsection 