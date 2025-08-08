@extends('admin.template')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-users fa-2x me-3"></i>
                        <div>
                            <h5 class="card-title mb-0">Total Warga</h5>
                            <p class="card-text fs-4">{{ $totalWarga ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user-shield fa-2x me-3"></i>
                        <div>
                            <h5 class="card-title mb-0">Total Petugas</h5>
                            <p class="card-text fs-4">{{ $totalPetugas ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-list fa-2x me-3"></i>
                        <div>
                            <h5 class="card-title mb-0">Kategori Iuran</h5>
                            <p class="card-text fs-4">{{ $totalKategori ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user-plus fa-2x me-3"></i>
                        <div>
                            <h5 class="card-title mb-0">Anggota Iuran</h5>
                            <p class="card-text fs-4">{{ $totalAnggotaIuran ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-money-bill-wave fa-2x me-3"></i>
                        <div>
                            <h5 class="card-title mb-0">Total Pembayaran</h5>
                            <p class="card-text fs-4">{{ $totalPembayaran ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
