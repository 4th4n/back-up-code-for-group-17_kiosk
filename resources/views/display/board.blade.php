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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let orders = @json($readyOrders);
        let countdown = 20;
        const countdownEl = document.getElementById('countdown');
        const nowServingEl = document.getElementById('now-serving');
        const upNextEl = document.getElementById('up-next');

        function updateDisplay() {
            if (orders.length === 0) {
                nowServingEl.textContent = '---';
                upNextEl.innerHTML = '<div class="text-muted">No orders remaining.</div>';
                return;
            }

            nowServingEl.textContent = orders[0].order_number;

            let upNextHTML = '';
            for (let i = 1; i < orders.length; i++) {
                upNextHTML += `
                    <div class="p-3 border rounded bg-light shadow-sm">
                        <h5 class="fw-bold">Order #${orders[i].order_number}</h5>
                        <small class="text-muted">Ready ${orders[i].ready_at_human}</small>
                    </div>`;
            }
            upNextEl.innerHTML = upNextHTML;
        }

        function rotateOrders() {
            if (orders.length === 0) return;

            const current = orders.shift(); // Remove current
            fetch("{{ route('order.autoPickUp') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: current.id })
            }).then(() => {
                // Move to next
                updateDisplay();
            });
        }

        updateDisplay(); // Initial load

        setInterval(() => {
            countdown--;
            countdownEl.textContent = countdown;

            if (countdown <= 0) {
                rotateOrders();
                countdown = 20;
            }
        }, 1000);
    });
</script>
@endsection
