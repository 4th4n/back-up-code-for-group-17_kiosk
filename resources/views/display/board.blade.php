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
    // Countdown duration (seconds)
    let countdown = 20;

    // State flags
    let allOrdersCompleted = false;

    // Track completed orders locally
    let completedOrders = JSON.parse(localStorage.getItem('completedOrders') || '[]');

    // Current orders shown in display
    let ordersData = [];

    // Filter orders for today (utility function)
    function filterTodayOrders(orders) {
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        return orders.filter(order => {
            const orderDate = new Date(order.ready_at);
            orderDate.setHours(0, 0, 0, 0);
            return orderDate.getTime() === today.getTime();
        });
    }

    // Refresh the display UI
    function refreshDisplay() {
        const orderDisplay = document.getElementById('order-display');

        if (allOrdersCompleted) {
            orderDisplay.innerHTML = `
                <div class="text-muted fs-4 py-5">
                    <i class="bi bi-check-circle-fill fs-1 d-block mb-3 text-success"></i>
                    All orders have been served today.
                </div>
            `;
            return;
        }

        if (!ordersData || ordersData.length === 0) {
            localStorage.setItem('allOrdersCompletedAt', Date.now().toString());
            allOrdersCompleted = true;

            orderDisplay.innerHTML = `
                <div class="text-muted fs-4 py-5">
                    <i class="bi bi-check-circle-fill fs-1 d-block mb-3 text-success"></i>
                    All orders have been served today.
                </div>
            `;
            return;
        }

        // Show current order and queue
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

        if (ordersData.length > 1) {
            displayHTML += `
                <hr>
                <h4 class="text-muted mb-3">Up Next</h4>
                <div id="up-next" class="d-flex justify-content-center flex-wrap gap-3">
            `;

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

        orderDisplay.innerHTML = displayHTML;
    }

    // Rotate current order (mark completed and remove from list)
    function rotateCurrentOrder() {
        if (!ordersData || ordersData.length === 0) return;

        const currentOrder = ordersData[0];
        ordersData.shift();

        fetch("{{ route('order.markCompleted') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: currentOrder.id })
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            // Mark locally as completed
            completedOrders.push(currentOrder.id);
            localStorage.setItem('completedOrders', JSON.stringify(completedOrders));

            if (ordersData.length > 0) {
                countdown = 20;
                refreshDisplay();
            } else {
                const orderDisplay = document.getElementById('order-display');
                orderDisplay.innerHTML = `
                    <div class="text-muted fs-4 py-5">
                        <i class="bi bi-hourglass-split fs-1 d-block mb-3"></i>
                        No orders ready for pickup today.
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error marking order as completed:', error);
            if (ordersData.length > 0) {
                countdown = 20;
                refreshDisplay();
            } else {
                const orderDisplay = document.getElementById('order-display');
                orderDisplay.innerHTML = `
                    <div class="text-muted fs-4 py-5">
                        <i class="bi bi-hourglass-split fs-1 d-block mb-3"></i>
                        No orders ready for pickup today.
                    </div>
                `;
            }
        });
    }

    // Fetch ready orders from server via AJAX
    function fetchReadyOrders() {
        fetch('/ready-orders')
            .then(res => res.json())
            .then(data => {
                // Filter out completed locally
                completedOrders = JSON.parse(localStorage.getItem('completedOrders') || '[]');
                let filtered = data.filter(order => !completedOrders.includes(order.id));
                filtered = filterTodayOrders(filtered);

                if (filtered.length === 0) {
                    localStorage.setItem('allOrdersCompletedAt', Date.now().toString());
                    allOrdersCompleted = true;
                } else {
                    allOrdersCompleted = false;
                }

                ordersData = filtered;
                refreshDisplay();
            })
            .catch(err => console.error('Error fetching ready orders:', err));
    }

    // Check if all orders were completed today (from localStorage timestamp)
    const lastCompletedTimestamp = localStorage.getItem('allOrdersCompletedAt');
    if (lastCompletedTimestamp) {
        const lastCompleted = new Date(parseInt(lastCompletedTimestamp));
        const todayStart = new Date();
        todayStart.setHours(0, 0, 0, 0);
        if (lastCompleted >= todayStart) {
            allOrdersCompleted = true;
        }
    }

    // Initial fetch on page load
    fetchReadyOrders();

    // Countdown timer every second
    setInterval(() => {
        countdown--;

        const countdownEl = document.getElementById('countdown');
        if (countdownEl) countdownEl.textContent = countdown;

        if (countdown <= 0) {
            rotateCurrentOrder();
            countdown = 20; // reset countdown for next order
        }
    }, 1000);

    // Polling: fetch ready orders every 10 seconds to get updates
    setInterval(fetchReadyOrders, 10000);

    // Pusher real-time updates (optional, keep if needed)
    try {
        const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true
        });

        const channel = pusher.subscribe('orders');

        channel.bind('order.ready', function(data) {
            if (allOrdersCompleted) return;

            const newOrder = data.order;
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            const orderDate = new Date(newOrder.ready_at);
            orderDate.setHours(0, 0, 0, 0);

            if (orderDate.getTime() !== today.getTime()) return;

            // If order not already in list or completed
            if (!ordersData.find(o => o.id === newOrder.id) && !completedOrders.includes(newOrder.id)) {
                ordersData.push(newOrder);

                // Play notification sound
                const audio = new Audio('/sounds/notification.mp3');
                audio.play().catch(e => console.log('Audio play prevented: ' + e));

                // Show alert
                const flash = document.createElement('div');
                flash.className = 'alert alert-success alert-dismissible fade show';
                flash.innerHTML = `
                    <strong>New Order Ready!</strong> Order #${newOrder.order_number} has been added to the queue.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                document.querySelector('.container').prepend(flash);
                setTimeout(() => flash.remove(), 3000);

                refreshDisplay();
            }
        });

        channel.bind('order.pickedUp', function(data) {
            ordersData = ordersData.filter(order => order.id !== data.orderId);
            refreshDisplay();
        });
    } catch (e) {
        console.error('Pusher setup failed:', e);
    }
});
</script>


@endsection