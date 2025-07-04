<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NorthStar Admin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user-list.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="admin-body">

    <aside class="sidebar">
        <div class="sidebar-header">
            NorthStar
            <button class="close-sidebar" onclick="toggleSidebar()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-border-all"></i>Dashboard
            </a>
            <a href="{{ route('admin.customers') }}" class="nav-item {{ request()->routeIs('admin.customers') ? 'active' : '' }}">
                <i class="fa-solid fa-user"></i> Customers
            </a>
            <a href="{{ route('admin.users') }}" class="nav-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i> Users
            </a>
            <a href="{{ route('admin.categories') }}" class="nav-item {{ request()->routeIs('admin.categories') ? 'active' : '' }}">
                <i class="fa-solid fa-th-large"></i> Categories
            </a>
            <a href="{{ route('admin.products') }}" class="nav-item {{ request()->routeIs('admin.products') ? 'active' : '' }}">
                <i class="fa-solid fa-border-all"></i> Products
            </a>
            <a href="{{ route('admin.orders') }}" class="nav-item {{ request()->routeIs('admin.orders') ? 'active' : '' }}">
                <i class="fa-solid fa-border-all"></i> Orders
            </a>
            <a href="{{ route('logout') }}" class="nav-item logout-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </aside>

    <div class="main-content-wrapper">
        <header class="main-header">
            <button class="menu-toggle" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="header-title">@yield('page_title', 'Dashboard')</h1>
            <div class="user-profile-widget">
                @if (auth()->check())
                    <img src="https://via.placeholder.com/40" class="user-avatar" alt="{{ auth()->user()->name }}">
                    <div class="user-details">
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <span class="user-role">{{ auth()->user()->role }}</span>
                    </div>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                @else
                    <span class="user-name">Guest</span>
                @endif
            </div>
        </header>

        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('open');
        }
    </script>
</body>
</html>