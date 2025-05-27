<div class="cardbg">
<div class="card mt-0">
    <div class="card-header text-center">
        <h2>Add New Item</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('/item/store') }}">
        @csrf

        <div class="form-group mb-3">
            <label for="item_name">Item Name:</label>
            <input type="text" name="item_name" id="item_name" class="form-control" required maxlength="100" value="{{ old('item_name') }}">
        </div>

        <div class="form-group mb-3">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" class="form-control" required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
                {{ $category->category_name }}
                </option>
            @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="unit_id">Storage Unit:</label>
            <select name="unit_id" id="unit_id" class="form-control" required>
            <option value="">Select Storage</option>
            @foreach ($storages as $storage)
                <option value="{{ $storage->unit_id }}" {{ old('unit_id') == $storage->unit_id ? 'selected' : '' }}>
                {{ $storage->unit_name }}
                </option>
            @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="0" required value="{{ old('quantity') }}">
        </div>

        <div class="form-group mb-3">
            <label for="date_stored">Date Stored:</label>
            <input type="date" name="date_stored" id="date_stored" class="form-control" required value="{{ old('date_stored') }}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-secondary" onclick="loadItemList()">Cancel</button>
        </form>
    </div>
</div>
</div>

<script>
function loadItemList() {
    fetch('/load-content/item')
        .then(response => response.text())
        .then(html => {
            document.getElementById('content').innerHTML = html;
        });
}
</script>
