<div class="container-fluid sticky-top bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="{{ route('dashboard') }}" class="navbar-brand">
                <h1 class="m-0 text-uppercase text-primary">
                    <i class="fa fa-clinic-medical me-2"></i>Klinik Sehat
                </h1>
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link">Dashboard</a>
                    
                    <!-- Mengelola Poli -->
                    <a href="{{ route('poli.index') }}" class="nav-item nav-link">Mengelola Poli</a>
                    
                    <!-- Mengelola Dokter -->
                    <a href="{{ route('dokter.index') }}" class="nav-item nav-link">Mengelola Dokter</a>
                    
                    <!-- Mengelola Pasien -->
                    <a href="{{ route('pasien.index') }}" class="nav-item nav-link">Mengelola Pasien</a>
                    
                    <!-- Mengelola Obat -->
                    <a href="{{ route('obat.index') }}" class="nav-item nav-link">Mengelola Obat</a>
                    
                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-item nav-link btn btn-link">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</div>
