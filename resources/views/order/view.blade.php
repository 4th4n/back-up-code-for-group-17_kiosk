
<div class="card text-center" style="width: 18rem; border-radius: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
  <div class="card-body">
    <div class="mb-3">
      <span style="font-size: 40px; color: #4CAF50;"></span>
    </div>
    <h5 class="card-title" style="font-family: 'Comic Sans MS', sans-serif; color: #4CAF50; font-weight: bold;">Order Success</h5>
    <p class="card-text" style="font-size: 1.2rem; color: #777;" text="center">Your Order has been placed</p>
    <hr>    
    <p class="card-text" style="font-size: 1.5rem; color: #e74c3c; font-weight: bold;">Your Order Number is <span>{{ $order->order_number }}</span></p>
    <a href="{{ route('kiosk.index') }}" class="btn btn-success mt-3" style="border-radius: 50px; padding: 10px 20px; font-weight: bold;">Back to Menu</a>
  </div>
</div>


