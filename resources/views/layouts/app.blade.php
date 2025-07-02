<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NorthStar Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r min-h-screen">
        <div class="p-6 text-green-900 font-bold text-xl">NorthStar</div>
        <nav class="space-y-2 px-4">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-green-900 hover:bg-green-100 rounded">Dashboard</a>
            <a href="{{ route('admin.customers') }}" class="block px-4 py-2 text-green-900 hover:bg-green-100 rounded">Customers</a>
            <a href="{{ route('admin.users') }}" class="block px-4 py-2 text-green-900 hover:bg-green-100 rounded">Users</a>
            <a href="{{ route('admin.categories') }}" class="block px-4 py-2 text-green-900 hover:bg-green-100 rounded">Categories</a>
            <a href="{{ route('admin.products') }}" class="block px-4 py-2 text-green-900 hover:bg-green-100 rounded">Products</a>
            <a href="{{ route('admin.orders') }}" class="block px-4 py-2 text-green-900 hover:bg-green-100 rounded">Orders</a>
            <a href="{{ route('logout') }}" class="block px-4 py-2 text-red-600 hover:bg-red-50 rounded">Logout</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1">
        <!-- Header -->
        <header class="flex justify-between items-center p-4 bg-white border-b">
            <h1 class="text-2xl font-bold text-green-900">Dashboard</h1>
            <div class="flex items-center space-x-2">
                @if (auth()->check())
                    <img src="https://via.placeholder.com/40" class="rounded-full" alt="{{ auth()->user()->name }}">
                    <span class="text-green-900 font-medium">{{ auth()->user()->role }}</span>
                @else
                    <span class="text-green-900 font-medium">Guest</span>
                @endif
            </div>
        </header>

        <!-- Content -->
        <main class="p-6 space-y-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
