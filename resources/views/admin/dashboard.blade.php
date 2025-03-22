<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-dark shadow-sm sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-brand mb-0 h1">
                <i class="bi bi-speedometer2 me-2"></i>Admin Dashboard
            </span>
            <div class="d-flex align-items-center">
                <span class="text-light me-3 d-none d-md-block"></span>
               
            </div>
        </div>
    </nav>

    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-start custom-offcanvas-bg" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header border-bottom border-light">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
            <i class="bi bi-grid-1x2-fill me-2"></i>Dashboard Menu
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <!-- Admin Dashboard Link -->
            <li class="nav-item mb-2">
                <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-house-door me-2"></i> Admin Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link menu-link active" href="{{ route('items.index') }}">
                    <i class="bi bi-box me-2"></i> Update Inventory
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link menu-link" href="{{ route('restock.index') }}">
                    <i class="bi bi-arrow-repeat me-2"></i> Restock Items
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link menu-link" href="{{ route('admin.history') }}">
                    <i class="bi bi-clock-history me-2"></i> Order History
                </a>
            </li>
            <li class="nav-item mt-4">
                <a class="nav-link logout-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>

    <!-- Main Content -->
    <main class="container my-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    /* Navbar styling */
    .navbar {
        background: linear-gradient(135deg, #2c3e50, #34495e);
        border-bottom: 3px solid #16a085;
    }
    .navbar-brand {
        font-size: 1.4rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        color: #ecf0f1;
    }
    .navbar-brand:hover {
        color: #1abc9c;
    }

    /* Offcanvas menu styling */
    .custom-offcanvas-bg {
        background: linear-gradient(160deg, #2c3e50, #1a2530);
        color: #ecf0f1;
    }
    .custom-offcanvas-bg .offcanvas-title {
        font-weight: 600;
        font-size: 1.2rem;
        color: #ffffff;
    }
    .custom-offcanvas-bg .nav-link {
        color: #ecf0f1;
        font-weight: 500;
        padding: 0.7rem 1rem;
        border-radius: 6px;
        transition: all 0.3s ease;
    }
    .custom-offcanvas-bg .nav-link:hover {
        background-color: rgba(52, 152, 219, 0.15);
        color: #3498db;
        transform: translateX(5px);
    }
    .custom-offcanvas-bg .nav-link.active {
        background-color: rgba(26, 188, 156, 0.2);
        color: #1abc9c;
        border-left: 3px solid #1abc9c;
    }

    /* Main content styling */
    main {
        padding-top: 1rem;
    }
    main .card {
        border: none;
        border-radius: 10px;
        background-color: #ffffff;
    }
    main .card-body {
        padding: 2rem;
    }
    h2 {
        color: #2c3e50;
        font-weight: 600;
        font-size: 1.6rem;
        margin-bottom: 1.5rem;
        border-bottom: 2px solid #f1f1f1;
        padding-bottom: 0.75rem;
    }

    /* Button styling */
    .btn-primary {
        background-color: #1abc9c;
        border-color: #1abc9c;
        font-weight: 500;
        border-radius: 6px;
        padding: 0.5rem 1.2rem;
        box-shadow: 0 2px 5px rgba(26, 188, 156, 0.3);
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #16a085;
        border-color: #16a085;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(26, 188, 156, 0.4);
    }

    .btn-secondary {
        background-color: #3498db;
        border-color: #3498db;
        font-weight: 500;
        border-radius: 6px;
        padding: 0.5rem 1.2rem;
        box-shadow: 0 2px 5px rgba(52, 152, 219, 0.3);
        transition: all 0.3s ease;
    }
    .btn-secondary:hover {
        background-color: #2980b9;
        border-color: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(52, 152, 219, 0.4);
    }

    /* Logout link styling */
    .nav-link.logout-link {
        color: #e74c3c;
        font-weight: 500;
        border-top: 1px solid rgba(236, 240, 241, 0.1);
        padding-top: 1rem;
    }
    .nav-link.logout-link:hover {
        background-color: rgba(231, 76, 60, 0.15);
        color: #e74c3c;
    }
    
    /* Table styling */
    .table {
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 8px;
        overflow: hidden;
    }
    .table thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #e9ecef;
        color: #2c3e50;
        font-weight: 600;
        padding: 12px 15px;
    }
    .table tbody td {
        padding: 12px 15px;
        border-bottom: 1px solid #f1f1f1;
        vertical-align: middle;
    }
    .table tbody tr:hover {
        background-color: rgba(26, 188, 156, 0.05);
    }
    
    /* Form styling */
    .form-control, .form-select {
        border-radius: 6px;
        padding: 0.65rem 1rem;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }
    .form-control:focus, .form-select:focus {
        border-color: #1abc9c;
        box-shadow: 0 0 0 0.25rem rgba(26, 188, 156, 0.25);
    }
    .form-label {
        color: #2c3e50;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    /* Card and stats styling */
    .stat-card {
        background-color: #ffffff;
        border-radius: 10px;
        border-left: 4px solid #1abc9c;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }
    .stat-card .stat-title {
        color: #7f8c8d;
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 0.75rem;
    }
    .stat-card .stat-value {
        color: #2c3e50;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    .stat-card .stat-icon {
        color: #1abc9c;
        font-size: 1.5rem;
        opacity: 0.8;
    }
    
    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        main .card-body {
            padding: 1.5rem;
        }
        .stat-card {
            margin-bottom: 1rem;
        }
    }
</style>
</html>