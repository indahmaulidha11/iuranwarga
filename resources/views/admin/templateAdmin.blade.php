<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iuran Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
                /* Navbar */
        .navbar {
            background-color: #f8bbd0; /* soft pink navbar */
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff !important; /* logo jadi putih */
        }
        .nav-link {
            color: #fff !important; /* menu navbar jadi putih */
            font-weight: 500;
        }
        .nav-link:hover {
            color: #ffff99 !important; /* hover jadi kuning muda agar terlihat */
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">IURAN<span style="color:#fff;">WARGA</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" >
                <ul class="navbar-nav ms-auto">
                     <li><a href="{{ route('admin.users') }}">Kelola User</a></li>
                     <li><a href="{{ route('admin.officers') }}">Kelola Officer</a></li>
                     <li><a href="{{ route('admin.dues.categories') }}">Kategori Iuran</a></li>
                     <li><a href="{{ route('admin.dues.members') }}">Anggota Iuran</a></li>
                     <li><a href="{{ route('admin.payments') }}">Pembayaran</a></li>
                     <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="fa fa-user login-icon"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
