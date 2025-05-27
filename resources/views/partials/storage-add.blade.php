    <div class="cardbg">
    <div class="card mt-0">
        <div class="card-header text-center">
        <h2>Add New Storage</h2>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ url('/storage/store') }}">
            @csrf
            <div class="form-group mb-3">
            <label for="unit_name">Unit Name:</label>
            <input type="text" id="unit_name" name="unit_name" class="form-control" required maxlength="100" />
            </div>
            <div class="form-group mb-3">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" class="form-control" required maxlength="100" />
            </div>
            <div class="form-group mb-3">
            <label for="size">Size:</label>
            <input type="text" id="size" name="size" class="form-control" required maxlength="100" />
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-secondary" onclick="loadStorageList()">Cancel</button>
        </form>
        </div>
    </div>
    </div>

    <script>
    function loadStorageList() {
    fetch('/load-content/storage')
        .then(response => response.text())
        .then(html => {
        document.getElementById('content').innerHTML = html;
        });
    }
    </script>
