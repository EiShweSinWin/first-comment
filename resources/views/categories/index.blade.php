<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
   
    </style>
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <div class="logo">NorthStar</div>
            <nav class="sidebar-links">
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="#"><i class="fas fa-users"></i> Customers</a>
                <a href="#"><i class="fas fa-user"></i> Users</a>
                <a href="#" class="active"><i class="fas fa-list"></i> Categories</a>
                <a href="#"><i class="fas fa-box"></i> Products</a>
                <a href="#"><i class="fas fa-shopping-cart"></i> Orders</a>
            </nav>
        </aside>
        <main style="flex: 1; background: var(--bg-secondary); padding: var(--padding-lg);">
            
            <div class="header">
                
                <h1>Category List</h1>
                <div class="user-info">
                    <img src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D" alt="Jenny">
                    <span>Jenny</span>
                </div>
            </div>
            <div class="header">
                <a href="{{ route('categories.create') }}" class="btn btn-register">+ New</a>
                <input type="text" class="search-bar" id="searchInput" placeholder="Search" onkeyup="searchTable()">
            </div>
            <div class="table-container">
                <table id="categoryTable">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">ID <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(1)">Category Name <i class="fas fa-sort"></i></th>
                            <th>Last Updated At</th> <!-- No sorting for this column as per request -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr style="cursor: pointer;" onclick="window.location='{{ route('categories.edit', $category->id) }}'">
                            <td>{{ $category->id }}</td>
                            <td style="display: flex; align-items: center; gap: 10px;">
                                <img src="{{ $category->image ? asset($category->image) : 'https://via.placeholder.com/40' }}"
                                     alt="{{ $category->name }}"
                                     style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                {{ $category->name }}
                            </td>
                            <td>{{ $category->updated_at->format('Y/m/d') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No categories found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $categories->links() }}
                </div>
            </div>
        </main>
    </div>

    <script>
        let sortDirection = 1;
        let lastSortedColumn = -1;

        // Search function
        function searchTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let table = document.getElementById("categoryTable");
            let tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName("td")[1]; // Search in Category Name column
                if (td) {
                    let text = td.textContent || td.innerText;
                    tr[i].style.display = text.toLowerCase().indexOf(input) > -1 ? "" : "none";
                }
            }
        }

        // Sort function
        function sortTable(n) {
            let table = document.getElementById("categoryTable");
            let rows, switching, i, x, y, shouldSwitch;
            switching = true;

            while (switching) {
                switching = false;
                rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

                for (i = 0; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[n];
                    y = rows[i + 1].getElementsByTagName("td")[n];

                    if (n === 0) { // ID (number)
                        if (Number(x.innerHTML) * sortDirection > Number(y.innerHTML) * sortDirection) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (n === 1) { // Category Name (text)
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }

            // Toggle sort direction and update arrows
            if (lastSortedColumn === n) {
                sortDirection *= -1;
            } else {
                sortDirection = 1;
            }
            lastSortedColumn = n;

            // Update sort arrows
            let headers = table.getElementsByTagName("th");
            for (let i = 0; i < headers.length; i++) {
                headers[i].classList.remove("sorted-asc", "sorted-desc");
                headers[i].getElementsByTagName("i")[0].className = "fas fa-sort";
            }
            headers[n].classList.add(sortDirection === 1 ? "sorted-asc" : "sorted-desc");
            headers[n].getElementsByTagName("i")[0].className = sortDirection === 1 ? "fas fa-sort-up" : "fas fa-sort-down";
        }
    </script>
</body>
</html>