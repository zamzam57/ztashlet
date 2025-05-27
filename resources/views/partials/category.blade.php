<div class="cardbg">
<div class="card mt-0">
    
    <div class="card-header text-center">
        <h2>Data Category</h2>
    </div>
    
    <div class="card-body">
        <button class="btn btn-primary" onclick="loadCategoryAddForm()">Add New Category</button>

        <script>
        function loadCategoryAddForm() {
            fetch('/load-content/category-add')
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
                    <th>ID Category</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->category_id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>
                        <a href="{{ url('/category/destroy/' . $category->category_id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this category?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br/>
        <div class="row">
            <div class="col-md-4">
                Page : {{ $categories->currentPage() }} <br/>
                Total Data : {{ $categories->total() }} <br/>
                Data Per Page : {{ $categories->perPage() }}
            </div>
            <div class="col-md-8 d-flex justify-content-end">
                {{ $categories->links() }}
            </div>
        </div>

    </div>
</div>
</div>

