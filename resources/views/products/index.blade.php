<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
   
</head>
<body>
    <div class="admin-container">
        <button class="menu-toggle"><i class="fas fa-bars"></i></button>
        <aside class="sidebar">
            <div class="logo">NorthStar</div>
            <nav class="sidebar-links">
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="#"><i class="fas fa-users"></i> Customers</a>
                <a href="#"><i class="fas fa-user"></i> Users</a>
                <a href="#"><i class="fas fa-list"></i> Categories</a>
                <a href="#" class="active"><i class="fas fa-box"></i> Products</a>
                <a href="#"><i class="fas fa-shopping-cart"></i> Orders</a>
            </nav>
        </aside>
        <main>
            <div class="header">
                <h1>Product List</h1>
                <div class="user-info">
                    <img src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D" alt="Jenny">
                    <span>Jenny</span>
                </div>
               
            </div>
            <div class="app-bar">
                <a href="{{ route('products.create') }}" class="btn btn-new">+ New</a>
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Search..." onkeyup="searchTable()">
                </div>
            </div>
            <div class="table-container">
                <table id="productTable">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)">ID <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(1)">Product Name <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(2)">Category Name <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(3)">Purchase Price <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(4)">Sale Price <i class="fas fa-sort"></i></th>
                            <th onclick="sortTable(5)">Stock <i class="fas fa-sort"></i></th>
                            <th>Last Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr style="cursor: pointer;" onclick="window.location='{{ route('products.edit', $product->id) }}'">
                                <td>{{ $product->id }}</td>
                                <td style="display: flex; align-items: center; gap: 10px;">
                                    <img src="{{ $product->image ? asset($product->image) : 'https://via.placeholder.com/40' }}"
                                         alt="{{ $product->name }}"
                                         style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                    {{ $product->name }}
                                </td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ number_format($product->purchased_price) }}</td>
                                <td>{{ number_format($product->sale_price) }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->updated_at->format('Y/m/d') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $products->links() }}
                </div>
            </div>
        </main>
    </div>
    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        let sortDirection = 1;
        let lastSortedColumn = -1;

        // Search function
        function searchTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let table = document.getElementById("productTable");
            let tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName("td")[1]; // Search in Product Name column
                if (td) {
                    let text = td.textContent || td.innerText;
                    tr[i].style.display = text.toLowerCase().indexOf(input) > -1 ? "" : "none";
                }
            }
        }

        // Sort function
        function sortTable(n) {
            let table = document.getElementById("productTable");
            let rows, switching, i, x, y, shouldSwitch;
            switching = true;

            while (switching) {
                switching = false;
                rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

                for (i = 0; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[n];
                    y = rows[i + 1].getElementsByTagName("td")[n];

                    if (n === 0 || n === 3 || n === 4 || n === 5) { // Numeric columns (ID, Purchase Price, Sale Price, Stock)
                        if (Number(x.innerHTML.replace(/,/g, '')) * sortDirection > Number(y.innerHTML.replace(/,/g, '')) * sortDirection) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (n === 1 || n === 2) { // Text columns (Product Name, Category Name)
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