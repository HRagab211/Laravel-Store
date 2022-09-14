<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('admin_title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('/panel_layout/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/panel_layout/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/panel_layout/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}"
        rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/panel_layout/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('/panel_layout/css/style.css') }}" rel="stylesheet">
    <style>
        .badge {
            position: absolute;
            top: 5px;
            left: 45px;
            padding: 5px 10px;
            border-radius: 50%;
            background-color: red;
            color: white;
        }
    </style>

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{ route('panel') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin Panel</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">

                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::guard('admin')->user()->name }}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('panel') }}" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    {{-- Categories --}}
                    <div class="nav-item dropdown">
                        <a href="{{ url('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Categories</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ url('categories') }}" class="dropdown-item">Add Categories</a>
                        </div>
                    </div>
                    {{-- Products --}}
                    <div class="nav-item dropdown">
                        <a href="{{ url('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-th me-2"></i>Products</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ url('products') }}" class="dropdown-item">Add new Products</a>
                            <a href="{{ route('product.all') }}" class="dropdown-item">view Products</a>
                        </div>
                    </div>
                    {{-- Orders --}}
                    <div class="nav-item dropdown">
                        <a href="{{ url('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-th me-2"></i>Orders</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('orders.index') }}" class="dropdown-item">Recent Orders</a>
                            <a href="{{ route('orders.confirmed') }}" class="dropdown-item">Confirmed Orders</a>
                        </div>
                    </div>



                </div>
        </div>
        </nav>
    </div>
    <!-- Sidebar End -->
