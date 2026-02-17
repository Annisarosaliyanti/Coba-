<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi Kecamatan Sungai Pinang - Sistem Informasi Pemerintahan">
    <title>@yield('title', 'Kecamatan Sungai Pinang')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
    <img src="{{ asset('images/Logo_Kota_Samarinda.png') }}" alt="Logo Kecamatan" class="logo">
    <span>Kecamatan Sungai Pinang</span>
</a>

            
            <button class="navbar-toggler" id="navbarToggler">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="navbar-menu" id="navbarMenu">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Beranda
                </a>
                
                <div class="nav-dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('profil.*') ? 'active' : '' }}">
                        <i class="fas fa-building"></i> Profil <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('profil.sambutan') }}" class="dropdown-item">Sambutan Pimpinan</a>
                        <a href="{{ route('profil.pimpinan') }}" class="dropdown-item">Profil Pimpinan</a>
                        <a href="{{ route('profil.sejarah') }}" class="dropdown-item">Sejarah</a>
                        <a href="{{ route('profil.visi-misi') }}" class="dropdown-item">Visi & Misi</a>
                        <a href="{{ route('profil.tupoksi') }}" class="dropdown-item">Tupoksi</a>
                        <a href="{{ route('profil.struktur') }}" class="dropdown-item">Struktur Organisasi</a>
                    </div>
                </div>
                
                <div class="nav-dropdown">
                    <a href="{{ route('pelayanan.index') }}" class="nav-link dropdown-toggle {{ request()->routeIs('pelayanan.*') ? 'active' : '' }}">
                        <i class="fas fa-hands-helping"></i> Pelayanan <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('pelayanan.index', 'pemerintahan') }}" class="dropdown-item">Kasi Pemerintahan</a>
                        <a href="{{ route('pelayanan.index', 'ekonomi') }}" class="dropdown-item">Kasi Ekonomi & Pembangunan</a>
                        <a href="{{ route('pelayanan.index', 'kesra') }}" class="dropdown-item">Kasi Kesejahteraan Rakyat</a>
                        <a href="{{ route('pelayanan.index', 'tantrib') }}" class="dropdown-item">Kasi Ketentraman & Ketertiban</a>
                    </div>
                </div>
                
                <a href="{{ route('berita.index') }}" class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}">
                    <i class="fas fa-newspaper"></i> Berita
                </a>
                
                <div class="nav-dropdown">
                    <a href="{{ route('ppid.index') }}" class="nav-link dropdown-toggle {{ request()->routeIs('ppid.*') ? 'active' : '' }}">
                        <i class="fas fa-folder-open"></i> PPID <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('ppid.dasar-hukum') }}" class="dropdown-item">Dasar Hukum</a>
                        <a href="{{ route('ppid.tugas-wewenang') }}" class="dropdown-item">Tugas & Wewenang</a>
                        <a href="{{ route('ppid.informasi-publik') }}" class="dropdown-item">Informasi Publik</a>
                    </div>
                </div>
                
                <a href="{{ route('kontak') }}" class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i> Kontak
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
               <div class="footer-section">

  <a href="{{ route('home') }}" class="footer-logo">
    <img src="{{ asset('images/Logo_Kota_Samarinda.png') }}" alt="Logo Kecamatan" class="footer-logo-img">
    <span>Kecamatan Sungai Pinang</span>
</a>
                    <p>Website Resmi Kecamatan Sungai Pinang. Melayani masyarakat dengan sepenuh hati untuk kemajuan bersama.</p>
                    <div class="social-links">
                        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Tautan Cepat</h4>
                    <ul>
                        <li><a href="{{ route('profil.visi-misi') }}">Visi & Misi</a></li>
                        <li><a href="{{ route('profil.struktur') }}">Struktur Organisasi</a></li>
                        <li><a href="{{ route('pelayanan.index') }}">Pelayanan</a></li>
                        <li><a href="{{ route('ppid.index') }}">PPID</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Layanan</h4>
                    <ul>
                        <li><a href="{{ route('pelayanan.index', 'pemerintahan') }}">Kasi Pemerintahan</a></li>
                        <li><a href="{{ route('pelayanan.index', 'ekonomi') }}">Kasi Ekonomi</a></li>
                        <li><a href="{{ route('pelayanan.index', 'kesra') }}">Kasi Kesra</a></li>
                        <li><a href="{{ route('pelayanan.index', 'tantrib') }}">Kasi Tantrib</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Kontak</h4>
                    <ul class="contact-info">
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Contoh No. 123, Sungai Pinang</li>
                        <li><i class="fas fa-phone"></i> (021) 1234567</li>
                        <li><i class="fas fa-envelope"></i> info@sungaipinang.go.id</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Kecamatan Sungai Pinang. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('navbarToggler').addEventListener('click', function() {
            document.getElementById('navbarMenu').classList.toggle('active');
        });

        // Dropdown toggle for mobile
        document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth <= 992) {
                    e.preventDefault();
                    this.parentElement.classList.toggle('active');
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>