Order: {{ $order->order_number }}
Date: {{ $order->created_at->format('F d, Y h:i A') }}

Items:
@foreach($order->items as $item)
{{ $item->name }} ({{ $item->pivot->quantity }}) - ₱{{ number_format($item->pivot->quantity * $item->price, 2) }}
@endforeach

Total: ₱{{ number_format($order->total_price, 2) }}

Status: Paid

Thank you for your purchase!
