    <div class="cardbg">
    <div class="card mt-0">
        <div class="card-header text-center">
        <h2>Add New Category</h2>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ url('/category/store') }}">
            @csrf
            <div class="form-group">
            <label for="category_name">Category Name:</label>
            <input type="text" id="category_name" name="category_name" class="form-control" required maxlength="100" />
            </div>
            <br/>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="#" onclick="loadCategoryList();" class="btn btn-secondary">Cancel</a>
        </form>
        </div>
    </div>
    </div>

    <script>
    function loadCategoryList() {
        // You need to implement this function to load the category list partial again
        fetch('/load-content/category')
        .then(response => response.text())
        .then(html => {
            document.getElementById('content-area').innerHTML = html;
        });
    }
    </script>
