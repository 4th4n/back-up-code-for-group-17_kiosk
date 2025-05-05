<div class="container">
  <div class="card text-center">
    <!-- <h2 class="title">Order Details</h2> -->
    <p class="order-number">
      <strong>Order Number:</strong> 
      <span style="font-size: 1.5rem; color: #e74c3c; font-weight: bold;">{{ $order->order_number }}</span>
    </p>
    <hr>
    <p class="message">Thank you for your order!</p>
    <p class="note">Keep this for your reference.</p>
    <a href="{{ route('kiosk.index') }}" class="btn btn-success mt-3" style="border-radius: 10px; padding: 10px 20px; font-weight: bold;">Back to Menu</a>
  </div>
</div>

<style>
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f8f9fa; /* Light background for better contrast */
    padding: 20px;
  }

  .card {
    background: #fff;
    padding: 20px;
    width: 100%;
    max-width: 400px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    font-family: Arial, sans-serif;
    text-align: center; /* Ensures all text inside is centered */
  }

  .title {
    font-size: 24px;
    font-weight: bold;
    color: #2ecc71; /* Green color for title */
    margin-bottom: 10px;
  }

  .order-number {
    font-size: 18px;
    margin-bottom: 10px;
    color: #333;
  }

  .message {
    font-size: 16px;
    color: #555;
  }

  .summary h3 {
    font-size: 18px;
    color: #444;
    margin: 10px 0;
  }

  .note {
    font-size: 12px;
    color: #999;
    margin-top: 10px;
  }

  hr {
    margin: 20px 0;
    border: none;
    border-top: 1px solid #ddd;
  }
</style>
acalsc;a,.c;a.c;ac;a.    

<!-- order number -->