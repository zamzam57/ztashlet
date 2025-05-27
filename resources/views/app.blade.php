<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="page1" style="display: flex;">
        <div class="menu">
            <div class="header" style="color: white; margin-bottom: 20px;">
                <h2>Dashboard</h2>
                <h2>Ztashlet</h2>
            </div>
            <a href="#" onclick="loadContent('home')">Home</a>
            <a href="#" onclick="loadContent('storage')">Storage</a>
            <a href="#" onclick="loadContent('item')" >Item</a>
            <a href="#" onclick="loadContent('category')">Category</a>
        </div>

        <div class="content flex-grow-1 p-3" id="content">
            <p>Select a menu item to load content.</p>
        </div>
    </div>

    <script>
        let currentContent = 'home'; // default page

        function setActiveMenu(page) {
            document.querySelectorAll('.menu a').forEach(a => {
                a.classList.remove('active');
                if (a.getAttribute('onclick') && a.getAttribute('onclick').includes(`loadContent('${page}')`)) {
                    a.classList.add('active');
                }
            });
        }

        function loadContent(page) {
            currentContent = page;
            setActiveMenu(page);
            fetch(`/load-content/${page}`)
                .then(response => {
                    if (!response.ok) throw new Error('Page not found');
                    return response.text();
                })
                .then(html => {
                    document.getElementById('content').innerHTML = html;
                    setupPaginationLinks();
                })
                .catch(error => {
                    document.getElementById('content').innerHTML = `<p>Error loading content: ${error.message}</p>`;
                });
        }

        function setupPaginationLinks() {
            document.querySelectorAll('#content .pagination a').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const url = new URL(this.href);
                    const pageParam = url.searchParams.get('page');

                    fetch(`/load-content/${currentContent}?page=${pageParam}`)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('content').innerHTML = html;
                            setupPaginationLinks();
                        });
                });
            });
        }

        function loadCategoryAddForm() {
  fetch('/load-content/category-add')
    .then(response => {
      if (!response.ok) throw new Error('Failed to load form');
      return response.text();
    })
    .then(html => {
      document.getElementById('content').innerHTML = html;
    })
    .catch(error => {
      document.getElementById('content').innerHTML = `<p>Error loading form: ${error.message}</p>`;
    });
}
function loadStorageAddForm() {
  fetch('/load-content/storage-add')
    .then(response => {
      if (!response.ok) throw new Error('Failed to load form');
      return response.text();
    })
    .then(html => {
      document.getElementById('content').innerHTML = html;
    })
    .catch(error => {
      document.getElementById('content').innerHTML = `<p>Error loading form: ${error.message}</p>`;
    });
}

function loadItemAddForm() {
  fetch('/load-content/item-add')
    .then(response => {
      if (!response.ok) throw new Error('Failed to load form');
      return response.text();
    })
    .then(html => {
      document.getElementById('content').innerHTML = html;
    })
    .catch(error => {
      document.getElementById('content').innerHTML = `<p>Error loading form: ${error.message}</p>`;
    });
}


        document.addEventListener("DOMContentLoaded", function () {
            loadContent('home'); // load home page awal
        });
    </script>
</body>
</html>
