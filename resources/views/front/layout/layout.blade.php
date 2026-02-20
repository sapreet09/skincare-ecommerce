<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GlowCare - Skincare Ecommerce</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">

    <!-- Custom CSS -->
    <style>
        body {
            background: #f8f9fa;
        }

        .navbar {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .brand {
            font-weight: bold;
            font-size: 24px;
            color: #e83e8c;
        }

        .footer {
            background: #fff;
            padding: 20px;
            margin-top: 50px;
            text-align: center;
        }
    </style>

</head>
<body>

    {{-- Header --}}
    @include('front.layout.header')

    {{-- Page Content --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('front.layout.footer')

</body>
</html>
