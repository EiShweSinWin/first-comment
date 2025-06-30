<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>

<body>
    <div class="admin-container">

        <aside class="sidebar">
            <div class="logo">NorthStar</div>
            <nav class="sidebar-links">
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="#"><i class="fas fa-users"></i> Customers</a>
                <a href="#"><i class="fas fa-user"></i> Users</a>
                <a href="#"><i class="fas fa-list"></i> Categories</a>
                <a href="#"><i class="fas fa-box"></i> Products</a>
                <a href="#"><i class="fas fa-shopping-cart"></i> Orders</a>
            </nav>
        </aside>
        <main style="flex: 1; background: var(--bg-secondary); padding: var(--padding-lg);">

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="form-container">


                    <div class="file-upload">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <label for="profile-image">Profile Image</label>
                        <div class="custom-file-input">
                            <input type="file" id="profile-image" name="image" accept="image/*" style="display:none">
                            <button type="button" class="btn-choose"
                                onclick="document.getElementById('profile-image').click()">Choose File</button>
                            <span class="file-name">No File Chosen</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category-name">Name</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}">
                   
                    </div>
                    <div class="form-group">
                        <label for="category-name">Code</label>
                        <input type="text" name="code" value="{{ old('code', $product->code) }}">
                   
                    </div>
                    <div class="form-group">
                        <label for="category-name">Purchase Price</label>
                        <input type="number" name="purchased_price"
                        value="{{ old('purchased_price', $product->purchased_price) }}">
                   
                    </div>

                    <div class="form-group">
                        <label for="category-name">Sale Price</label>
                        <input type="number" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}">
                   
                    </div>
                    <div class="form-group">
                        <label for="category-name">Stock</label>
                        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
                   
                    </div>
                 
                    
                   
                   

                    <select name="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="category-name">description</label>
                        <textarea name="description">{{ old('description', $product->description) }}</textarea>
                   
                    </div>
                   

                    <button type="button" class="btn btn-delete"
                        onclick="if(confirm('Are you sure?')) { document.getElementById('delete-category-form').submit(); }">
                        <i class="fa-solid fa-trash"></i>
                    </button>


                    <div class="btn-group">
                        <button type="submit" class="btn btn-register">Update</button>
                        <button type="reset" class="btn btn-cancel">Cancel</button>
                    </div>
                </div>
            </form>
            <form id="delete-category-form" action="{{ route('products.destroy', $product->id) }}" method="POST"
                style="display: none;">
                @csrf
                @method('DELETE')
            </form>


        </main>
    </div>
</body>

</html>