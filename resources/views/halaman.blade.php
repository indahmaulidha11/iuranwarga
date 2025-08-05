<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iuran Warga</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fce4ec; /* soft pink background */
            font-family: 'Poppins', sans-serif;
        }

        /* Navbar */
        .navbar {
            background-color: #f8bbd0; /* soft pink navbar */
        }
        .navbar-brand {
            font-weight: bold;
            color: #333;
        }
        .nav-link {
            color: #333 !important;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #000 !important;
        }

        /* Section Title */
        .section-title {
            text-align: center;
            margin: 50px 0 30px;
            font-weight: bold;
            color: #333;
        }

        /* Card */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fffde7; /* soft yellow card */
        }

        /* Icon Circle */
        .icon-circle {
            width: 50px;
            height: 50px;
            background-color: #fdd835; /* soft yellow icon background */
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-bottom: 10px;
            font-size: 20px;
        }

        /* Login Icon */
        .login-icon {
            color: #333;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">IURAN<span style="color:#00796b;">WARGA</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="fa fa-user login-icon"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Services Section -->
    <div class="container">
        <h2 class="section-title">Layanan Kami</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card p-4">
                    <div class="icon-circle">
                        <i class="fa fa-image"></i>
                    </div>
                    <h5>TRANSAKSI</h5>
                    <p>Mencatat transaksi pemasukan dan pengeluaran Warga </p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-4">
                    <div class="icon-circle">
                        <i class="fa fa-coins"></i>
                    </div>
                    <h5>IURAN</h5>
                    <p>Mencatat berbagai iuran, iuran IPL, sampah, keamanan, arisan, dll</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-4">
                    <div class="icon-circle">
                        <i class="fa fa-users"></i>
                    </div>
                    <h5>MULTIUSER</h5>
                    <p>Mendukung multi user, transaksi dan iuran dapat dilihat secara real time</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
