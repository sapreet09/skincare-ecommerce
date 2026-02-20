<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - GlowCare</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f6f8fb;
        }

        .sidebar {
            height: 100vh;
            background: #111827;
            color: white;
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px;
            display: block;
        }

        .sidebar a:hover {
            background: #1f2937;
            color: #fff;
        }

        .content-area {
            padding: 25px;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        {{-- Sidebar --}}
        <div class="col-md-2 p-0">
            @include('admin.layouts.sidebar')
        </div>

        {{-- Main --}}
        <div class="col-md-10 p-0">

            {{-- Navbar --}}
            @include('admin.layouts.navbar')

            <div class="content-area">
                @yield('content')
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
