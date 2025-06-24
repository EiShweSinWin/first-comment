<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
   
</head>
<body>
    <div class="admin-container">
      
        <aside class="sidebar">
            <div class="logo">NorthStar</div>
            <nav class="sidebar-links">
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="#"><i class="fas fa-users"></i> Customers</a>
                <a href="#"><i class="fas fa-user"></i> Users</a>
                <a href="#" ><i class="fas fa-list"></i> Categories</a>
                <a href="#"><i class="fas fa-box"></i> Products</a>
                <a href="#"><i class="fas fa-shopping-cart"></i> Orders</a>
            </nav>
        </aside>
        <main style="flex: 1; background: var(--bg-secondary); padding: var(--padding-lg);">
            <div class="form-container">

                <div class="file-upload">
                    <span class="icon"><i class="fas fa-user"></i></span>
                    <label for="profile-image">Profile Image</label>
                    <div class="custom-file-input">
                        <input type="file" id="profile-image" accept="image/*">
                        <button class="btn-choose" onclick="document.getElementById('profile-image').click()">Choose File</button>
                        <span class="file-name">No File Chosen</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category-name">Name</label>
                    <input type="text" id="category-name" placeholder="Enter Category Name">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role">
                        <option value="" disabled selected>Select</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="btn-group">
                    <button class="btn btn-register">Register</button>
                    <button class="btn btn-cancel">Cancel</button>
                </div>
            </div>
        </main>
    </div>
</body>
</html>