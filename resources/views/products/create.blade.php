<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Register</title>
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
                <h1>Product Register</h1>
                <div class="user-info">
                    <img src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D" alt="Jenny">
                    <span>Jenny</span>
                </div>
               
            </div>
            
            <div class="form-container">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="file-upload">
                        <span class="icon"><i class="fas fa-camera"></i></span>
                        <label for="product-image">Product Image</label>
                        <div class="custom-file-input">
                            <input type="file" id="product-image" name="image" accept="image/*" style="display:none">
                            <button type="button" class="btn-choose" onclick="document.getElementById('product-image').click()">Choose File</button>
                            <span class="file-name">No File Chosen</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product-name">Name</label>
                        <input type="text" id="product-name" name="name" placeholder="Enter Product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="product-code">Code</label>
                        <input type="text" id="product-code" name="code" placeholder="Enter Product Code" required>
                    </div>
                    <div class="form-group">
                        <label for="purchased-price">Purchased</label>
                        <input type="number" id="purchased-price" name="purchased_price" placeholder="Enter Price" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="sale-price">Sale</label>
                        <input type="number" id="sale-price" name="sale_price" placeholder="Enter Price" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" id="stock" name="stock" placeholder="Enter Stock" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category_id" required>
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" placeholder="Enter Description" rows="4"></textarea>
                    </div>
                    <div class="btn-group">
                        <button type="submit" class="btn btn-register">Register</button>
                        <button type="reset" class="btn btn-cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>
</html>