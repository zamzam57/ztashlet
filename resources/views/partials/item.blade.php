<div class="cardbg">
<div class="card mt-0">

    <div class="card-header text-center">
        <h2>Data Items</h2>
    </div>

    <div class="card-body">
        <button class="btn btn-primary" onclick="loadItemAddForm()">Add New Item</button>

        <script>
        function loadItemAddForm() {
            fetch('/load-content/item-add')
            .then(response => response.text())
            .then(html => {
                document.getElementById('content').innerHTML = html;
            });
        }
        </script>
        <br/><br/>

        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>ID Item</th>
                    <th>Item Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit ID</th>
                    <th>Category ID</th>
                    <th>Date Stored</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->item_id }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->unit_id }}</td>
                    <td>{{ $item->category_id }}</td>
                    <td>{{ $item->date_stored }}</td>
                    <td>
                        <a href="{{ url('/item/destroy/' . $item->item_id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this item?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br/>
        <div class="row">
            <div class="col-md-4">
                Page : {{ $items->currentPage() }} <br/>
                Total Data : {{ $items->total() }} <br/>
                Data Per Page : {{ $items->perPage() }}
            </div>
            <div class="col-md-8 d-flex justify-content-end">
                {{ $items->links() }}
            </div>
        </div>

    </div>
</div>
</div>
