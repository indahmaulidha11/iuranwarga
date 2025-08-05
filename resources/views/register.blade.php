<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Iuran Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100" style="background:#fce4ec;">
    <div class="card p-4" style="width: 400px; background:#fffde7;">
        <h4 class="text-center mb-3">Register</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="nohp" class="form-control">
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="address" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label>Level</label>
                <select name="level" class="form-select" required>
                    <option value="warga">Warga</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button class="btn btn-warning w-100">Register</button>
        </form>

        <p class="text-center mt-3">
            Sudah punya akun? <a href="{{ url('/login') }}">Login</a>
        </p>
    </div>
</body>
</html>
