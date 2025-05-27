{{-- resources/views/partials/storage.blade.php --}}
<div class="cardbg">
    <div class="card mt-0">
        
        <div class="card-header text-center">
            <h2>Data Storage</h2>
        </div>
        
        <div class="card-body">
        <button class="btn btn-primary" onclick="loadStorageAddForm()">Add New Storage</button>

        <script>
        function loadStorageAddForm() {
            fetch('/load-content/storage-add')
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
                        <th>ID Storage</th>
                        <th>Unit Name</th>
                        <th>Location</th>
                        <th>Size</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($storages as $storage)
                    <tr>
                        <td>{{ $storage->unit_id }}</td>
                        <td>{{ $storage->unit_name }}</td>
                        <td>{{ $storage->location }}</td>
                        <td>{{ $storage->size }}</td>
                        <td>
                            <a href="{{ url('/storage/destroy/' . $storage->unit_id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this storage unit?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <br/>
            <div class="row">
                <div class="col-md-4">
                    Page : {{ $storages->currentPage() }} <br/>
                    Total Data : {{ $storages->total() }} <br/>
                    Data Per Page : {{ $storages->perPage() }}
                </div>
                <div class="col-md-8 d-flex justify-content-end">
                    {{ $storages->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
