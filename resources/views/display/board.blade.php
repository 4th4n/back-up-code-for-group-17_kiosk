@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center display-5 fw-bold text-primary mb-4">
        <i class="bi bi-megaphone"></i> Now Serving
    </h1>
    
    <div class="card shadow-lg">
        <div class="card-body text-center" id="order-display">
            @if($readyOrders->isNotEmpty())
                <div class="mb-5">
                    <h2 id="now-serving" class="display-1 fw-bold text-success">
                        {{ $readyOrders->first()->order_number }}
                    </h2>
                    
                    <div class="mt-4">
                        <span class="badge bg-secondary fs-5">Next in: <span id="countdown">20</span>s</span>
                    </div>
                </div>
                
                <hr>
                
                <h4 class="text-muted mb-3">Up Next</h4>
                <div id="up-next" class="d-flex justify-content-center flex-wrap gap-3">
                    @foreach($readyOrders->skip(1) as $order)
                        <div class="p-3 border rounded bg-light shadow-sm">
                            <h5 class="fw-bold">Order #{{ $order->order_number }}</h5>
                            <small class="text-muted">Ready {{ $order->ready_at->diffForHumans() }}</small>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-muted fs-4 py-5">
                    <i class="bi bi-hourglass-split fs-1 d-block mb-3"></i>
                    No orders ready for pickup.
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Add Pusher JS Library for real-time updates -->
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<script>
   document.addEventListener('DOMContentLoaded', function () {
    // Keep track of the currently displayed orders
    let allOrdersData = @json($readyOrders);
    let countdown = 20;
    
    // Filter orders to only include today's orders
    function filterTodayOrders(orders) {
        const today = new Date();
        today.setHours(0, 0, 0, 0); // Set to beginning of today
        
        return orders.filter(order => {
            // Convert ready_at to a Date object
            const orderDate = new Date(order.ready_at);
            orderDate.setHours(0, 0, 0, 0); // Set to beginning of the order's day
            
            // Check if the order date is today
            return orderDate.getTime() === today.getTime();
        });
    }
    
    // Get only today's orders
    let ordersData = filterTodayOrders(allOrdersData);
    
    // Function to completely refresh the entire display
    function refreshDisplay() {
        const orderDisplay = document.getElementById('order-display');
        
        // If no orders, show empty state
        if (!ordersData || ordersData.length === 0) {
            orderDisplay.innerHTML = `
                <div class="text-muted fs-4 py-5">
                    <i class="bi bi-hourglass-split fs-1 d-block mb-3"></i>
                    No orders ready for pickup today.
                </div>
            `;
            return;
        }
        
        // Otherwise show the current order and queue
        let displayHTML = `
            <div class="mb-5">
                <h2 id="now-serving" class="display-1 fw-bold text-success">
                    ${ordersData[0].order_number}
                </h2>
                
                <div class="mt-4">
                    <span class="badge bg-secondary fs-5">Next in: <span id="countdown">${countdown}</span>s</span>
                </div>
            </div>
        `;
        
        // Only add the "Up Next" section if there are more orders
        if (ordersData.length > 1) {
            displayHTML += `
                <hr>
                <h4 class="text-muted mb-3">Up Next</h4>
                <div id="up-next" class="d-flex justify-content-center flex-wrap gap-3">
            `;
            
            // Add the remaining orders
            for (let i = 1; i < ordersData.length; i++) {
                displayHTML += `
                    <div class="p-3 border rounded bg-light shadow-sm">
                        <h5 class="fw-bold">Order #${ordersData[i].order_number}</h5>
                        <small class="text-muted">Ready ${ordersData[i].ready_at_human}</small>
                    </div>
                `;
            }
            
            displayHTML += `</div>`;
        }
        
        // Update the entire display
        orderDisplay.innerHTML = displayHTML;
    }
    
    // Function to handle order rotation
    function rotateCurrentOrder() {
        if (!ordersData || ordersData.length === 0) return;
        
        // Get the current order
        const currentOrder = ordersData[0];
        
        // Remove it from our local array
        ordersData.shift();
        
        // Send request to mark as picked up
        fetch("{{ route('order.autoPickUp') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: currentOrder.id })
        })
        .then(() => {
            // After successfully marking as picked up, refresh the display
            countdown = 20;
            refreshDisplay();
        })
        .catch(error => {
            console.error('Error marking order as picked up:', error);
            // Even on error, remove from display
            countdown = 20;
            refreshDisplay();
        });
    }
    
    // Initial display
    refreshDisplay();
    
    // Set up countdown timer
    setInterval(() => {
        countdown--;
        
        // Update the countdown display if it exists
        const countdownEl = document.getElementById('countdown');
        if (countdownEl) {
            countdownEl.textContent = countdown;
        }
        
        // When countdown reaches zero, rotate to next order
        if (countdown <= 0) {
            rotateCurrentOrder();
        }
    }, 1000);
    
    // Set up real-time updates
    try {
        const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true
        });
        
        const channel = pusher.subscribe('orders');
        
        // Listen for new ready orders
        channel.bind('order.ready', function(data) {
            const newOrder = data.order;
            
            // Check if this order is from today
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            const orderDate = new Date(newOrder.ready_at);
            orderDate.setHours(0, 0, 0, 0);
            
            if (orderDate.getTime() !== today.getTime()) {
                return; // Skip orders not from today
            }
            
            // Check if this order is already in our list
            const existingIndex = ordersData.findIndex(o => o.id === newOrder.id);
            
            if (existingIndex === -1) {
                // Add new order to the end
                ordersData.push(newOrder);
                
                // Play notification sound
                const audio = new Audio('/sounds/notification.mp3');
                audio.play().catch(e => console.log('Audio play prevented: ' + e));
                
                // Refresh the display
                refreshDisplay();
            }
        });
        
        // Listen for order pickup events
        channel.bind('order.pickedUp', function(data) {
            // Remove the picked up order from our list
            ordersData = ordersData.filter(order => order.id !== data.orderId);
            
            // Refresh the display
            refreshDisplay();
        });
    } catch (e) {
        console.error('Pusher setup failed:', e);
    }
    
    // Function to periodically check for order updates from the server
    function fetchLatestOrders() {
        fetch("{{ route('api.orders.ready') }}")
            .then(response => response.json())
            .then(data => {
                // Filter to get only today's orders
                ordersData = filterTodayOrders(data);
                refreshDisplay();
            })
            .catch(error => {
                console.error('Error fetching latest orders:', error);
            });
    }
    
    // Fetch latest orders every 30 seconds
    setInterval(fetchLatestOrders, 30000);
});
</script>
@endsection