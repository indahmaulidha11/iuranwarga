<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iuran Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background-color: #f8bbd0;
            color: white;
            padding: 20px 0;
            flex-shrink: 0;
        }

        .sidebar .nav-link {
            color: #fff;
            font-weight: 500;
            padding: 10px 20px;
        }

        .sidebar .nav-link:hover {
            background-color: #f48fb1;
            color: #ffff99;
        }

        .sidebar .navbar-brand {
            font-weight: bold;
            color: #fff;
            text-align: center;
            display: block;
            margin-bottom: 30px;
        }

        .content {
            flex-grow: 1;
            padding: 30px;
        }

        .nav-icon {
            width: 20px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <a class="navbar-brand" href="#">IURAN<span style="color:#fff;">WARGA</span></a>
        <ul class="nav flex-column">
            
            </li>
            <li class="nav-item">
                <a href="{{ route('users') }}" class="nav-link">
                    <i class="fa fa-users nav-icon"></i> Kelola User
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('officers') }}" class="nav-link">
                    <i class="fa fa-user-tie nav-icon"></i> Kelola Officer
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dues.categori') }}" class="nav-link">
                    <i class="fa fa-list nav-icon"></i> Kategori Iuran
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dues.members') }}" class="nav-link">
                    <i class="fa fa-users-cog nav-icon"></i> Anggota Iuran
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('payment') }}" class="nav-link">
                    <i class="fa fa-money-bill nav-icon"></i> Pembayaran
                </a>
            </li>
            <li class="nav-item mt-4">
                <a href="/login" class="nav-link">
                    <i class="fa fa-sign-out-alt nav-icon"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
