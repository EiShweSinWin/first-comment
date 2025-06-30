<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
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
                <a href="#" ><i class="fas fa-list"></i> Categories</a>
                <a href="#"><i class="fas fa-box"></i> Products</a>
                <a href="#"><i class="fas fa-shopping-cart"></i> Orders</a>
            </nav>
        </aside>
        <main style="flex: 1; background: var(--bg-secondary); padding: var(--padding-lg);">
          
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
			
                @csrf
                @method('PUT')
                <div class="form-container">
            
                  
                    <div class="file-upload">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <label for="profile-image">Profile Image</label>
                        <div class="custom-file-input">
                            <input type="file" id="profile-image" name="image" accept="image/*" style="display:none">
                            <button type="button" class="btn-choose" onclick="document.getElementById('profile-image').click()">Choose File</button>
                            <span class="file-name">No File Chosen</span>
                        </div>
                    </div>
            
                   
                    <div class="form-group">
                        <label for="category-name">Name</label>
                                <input type="text" name="name" value="{{old('name', $category->name)}}">
                   
                    </div>
            
                    <button type="button" class="btn btn-delete" onclick="if(confirm('Are you sure?')) { document.getElementById('delete-category-form').submit(); }">
                        <i class="fa-solid fa-trash"></i> 
                    </button>
                    
                   
                    <div class="btn-group">
                        <button type="submit" class="btn btn-register">Update</button>
                        <button type="reset" class="btn btn-cancel">Cancel</button>
                    </div>
                </div>
            </form>
            <form id="delete-category-form" action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
           
          
        </main>
    </div>
</body>
</html>