<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard') | Electronics Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
        }
        .sidebar {
            min-height: 100vh;
            background: #111827;
        }
        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background: #1f2937;
            color: #fff;
        }
        .product-img {
            width: 60px;
        }
        .card-summary {
            background: #111827;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-white text-center py-4">My Account</h4>
            <a href="{{ route('dashboard') }}" class="@if(request()->routeIs('dashboard')) active @endif">
                <i class="fa fa-chart-line me-2"></i> Dashboard
            </a>
            <a href="#"><i class="fa fa-cart-shopping me-2"></i> Cart</a>
            <a href="#"><i class="fa fa-box me-2"></i> Orders</a>
            <a href="#"><i class="fa fa-user me-2"></i> Profile</a>
            <a href="#"><i class="fa fa-right-from-bracket me-2"></i> Logout</a>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
