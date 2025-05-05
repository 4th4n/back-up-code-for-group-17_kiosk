@extends('cashier.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm" style="border-radius: 10px; border: none;">
                <div class="card-body" id="receipt-to-print">
                    <h2 class="text-center mb-4" style="color: #4CAF50; font-weight: bold;">Receipt</h2>
                    <div class="text-center">
                        <h4>Order Number: <span class="text-muted">{{ $order->order_number }}</span></h4>
                        <p><strong>Date:</strong> {{ $order->created_at->format('F d, Y h:i A') }}</p>
                    </div>
                    <hr>
                    
                    <h5 style="color: #333;">Items:</h5>
                    <ul class="list-unstyled">
                        @foreach($order->items as $item)
                            <li class="d-flex justify-content-between" style="border-bottom: 1px solid #ddd; padding: 8px 0;">
                                <span>{{ $item->name }} ({{ $item->pivot->quantity }} pcs)</span>
                                <span>₱{{ number_format($item->pivot->quantity * $item->price, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between" style="font-size: 1.2rem;">
                        <strong>Total:</strong>
                        <span>₱{{ number_format($order->total_price, 2) }}</span>
                    </div>
                    
                    <hr>
                    
                    <div class="text-center">
                        <p class="mb-0" style="font-weight: bold; color: #e74c3c;">Status: <span class="text-success">Paid</span></p>
                        <p class="mt-2">Thank you for your purchase!</p>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button onclick="printViaSerial()" class="btn btn-primary">🖨️ Print via Serial</button>
                    <button onclick="printViaESC()" class="btn btn-success ml-2">🖨️ Print ESC/POS</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Function for basic serial printing
async function printViaSerial() {
    try {
        const receiptElement = document.getElementById('receipt-to-print');
        if (!receiptElement) {
            throw new Error("Receipt element not found");
        }
        
        // Format text for thermal printer
        let text = "\n\n";
        text += "        RECEIPT        \n";
        text += "======================\n\n";
        text += "Order: {{ $order->order_number }}\n";
        text += "Date: {{ $order->created_at->format('F d, Y h:i A') }}\n\n";
        text += "Items:\n";
        
        @foreach($order->items as $item)
            text += "{{ $item->name }} ({{ $item->pivot->quantity }})\n";
            text += "   ₱{{ number_format($item->pivot->quantity * $item->price, 2) }}\n";
        @endforeach
        
        text += "\nTotal: ₱{{ number_format($order->total_price, 2) }}\n\n";
        text += "Status: Paid\n\n";
        text += "Thank you for your purchase!\n\n\n\n\n"; // Extra line feeds for paper cutting
        
        const encoder = new TextEncoder();
        const data = encoder.encode(text);
        
        const port = await navigator.serial.requestPort();
        await port.open({ baudRate: 9600 }); // Most thermal printers use 9600 baud
        
        const writer = port.writable.getWriter();
        await writer.write(data);
        writer.releaseLock();
        await port.close();
        
        alert("✅ Printed successfully!");
    } catch (error) {
        console.error(error);
        alert("❌ Print failed: " + error.message);
    }
}

// Function for ESC/POS thermal printer commands
async function printViaESC() {
    try {
        // Initialize port
        const port = await navigator.serial.requestPort();
        await port.open({ baudRate: 9600 });
        const writer = port.writable.getWriter();
        
        // ESC/POS commands
        const ESC = 0x1B;
        const GS = 0x1D;
        
        // Reset printer
        await writer.write(new Uint8Array([ESC, 0x40]));
        
        // Center align
        await writer.write(new Uint8Array([ESC, 0x61, 1]));
        
        // Text size - slightly larger
        await writer.write(new Uint8Array([GS, 0x21, 0x11]));
        
        // Print title
        const title = "RECEIPT\n";
        await writer.write(new TextEncoder().encode(title));
        
        // Normal text size
        await writer.write(new Uint8Array([GS, 0x21, 0x00]));
        
        // Left align
        await writer.write(new Uint8Array([ESC, 0x61, 0]));
        
        // Print receipt content
        const content = 
            "\nOrder: {{ $order->order_number }}\n" +
            "Date: {{ $order->created_at->format('F d, Y h:i A') }}\n\n" +
            "Items:\n";
        await writer.write(new TextEncoder().encode(content));
        
        // Print items
        @foreach($order->items as $item)
            const itemText = "{{ $item->name }} ({{ $item->pivot->quantity }})\n" +
                          "   ₱{{ number_format($item->pivot->quantity * $item->price, 2) }}\n";
            await writer.write(new TextEncoder().encode(itemText));
        @endforeach
        
        // Print total with bold
        await writer.write(new Uint8Array([ESC, 0x45, 1])); // Bold on
        const totalText = "\nTotal: ₱{{ number_format($order->total_price, 2) }}\n\n";
        await writer.write(new TextEncoder().encode(totalText));
        await writer.write(new Uint8Array([ESC, 0x45, 0])); // Bold off
        
        // Center align for footer
        await writer.write(new Uint8Array([ESC, 0x61, 1]));
        
        // Print status and thank you
        const footer = "Status: Paid\n\nThank you for your purchase!\n\n\n\n";
        await writer.write(new TextEncoder().encode(footer));
        
        // Cut paper - partial cut
        await writer.write(new Uint8Array([GS, 0x56, 1]));
        
        // Clean up
        writer.releaseLock();
        await port.close();
        
        alert("✅ Printed with ESC/POS commands!");
    } catch (error) {
        console.error(error);
        alert("❌ ESC/POS print failed: " + error.message);
    }
}
</script>

<style>
    .card {
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .card-body {
        font-family: 'Arial', sans-serif;
    }
    
    h2, h4, h5 {
        font-family: 'Roboto', sans-serif;
    }
    
    ul {
        padding-left: 0;
    }
    
    ul li {
        font-size: 1rem;
    }
    
    .text-muted {
        color: #777;
    }
    
    .text-success {
        color: #2ecc71;
    }
    
    .ml-2 {
        margin-left: 0.5rem;
    }
    
    .mb-4, .mt-2, .mt-3 {
        margin-bottom: 1.5rem;
    }
    
    .text-center {
        text-align: center;
    }
</style>
@endsection