<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="d-flex">

    {{-- Sidebar --}}
    <div class="bg-dark text-white p-3" style="width:250px;height:100vh;">
        <h4>Admin</h4>

        <a href="{{ route('admin.dashboard') }}" class="d-block text-white mb-2">
            Dashboard
        </a>

        <a href="{{ route('products.index') }}" class="d-block text-white mb-2">
            Products
        </a>
    </div>

    {{-- Content --}}
    <div class="p-4 w-100">
        @yield('content')
    </div>

</div>

</body>
</html>
