@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="modal fade" id="createItemModal" tabindex="-1" aria-labelledby="createItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createItemModalLabel">Create Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Item Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Item Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="Price" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="stocks" class="form-label">Total Units</label>
                        <input type="number" name="stock" class="form-control" id="stock" placeholder="Total Number of Units Available" required>
                    </div>

                    <!-- Unit -->
                    <div class="mb-3">
                        <label for="unit" class="form-label">Unit</label>
                        <select name="unit" id="unit" class="form-select">
                          <option value="">Select Unit</option>
                          <option value="tray">tray</option>
                          <option value="box">box</option>
                          <option value="pack">pack</option>
                       </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity per Unit</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Quantity per Unit" required>
                    </div>

                    <!-- Total Stocks (Units Available) -->
                   
                    <!-- Low Stock Level -->
                    <div class="mb-3">
                        <label for="low_stock_level" class="form-label">Low Stock Level</label>
                        <input type="number" name="low_stock_level" class="form-control" id="low_stock_level" placeholder="Low stock level" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control" id="image" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="Breakfast">Breakfast</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Snacks">Snacks</option>
                            <option value="Cup Noodles">Cup Noodles</option>
                            <option value="Drinks">Drinks</option>
                            <option value="Biscuits">Biscuits</option>
                            <option value="Junk foods">Junk foods</option>
                            <option value="Chocolates">Chocolates</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Item</button>
                </form>
            </div>
        </div>
    </div>
</div>
