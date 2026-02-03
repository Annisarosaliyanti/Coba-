<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi Kecamatan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
        /* Memastikan konten tidak tertutup navbar fixed */
        main { min-height: 100vh; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased overflow-x-hidden">

    <nav x-data="{ open: false }" class="fixed w-full z-[100] bg-white border-b border-gray-100 shadow-sm">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center h-12">
                
                <a href="/" class="flex items-center gap-3 z-[110]">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/bc/Logo_Garuda_Pancasila.webp" 
                         alt="Logo" class="h-10 w-auto">
                    <div class="flex flex-col">
                        <span class="font-bold text-blue-900 leading-none text-sm md:text-base">KECAMATAN</span>
                        <span class="text-[9px] md:text-[10px] font-semibold text-gray-500 tracking-wider uppercase">Pemerintah Kabupaten</span>
                    </div>
                </a>

                <div class="hidden md:flex items-center gap-6 font-semibold text-gray-700">
                    <a href="#" class="hover:text-blue-600 transition">Beranda</a>
                    
                    <div x-data="{ openProfil: false }" @mouseenter="openProfil = true" @mouseleave="openProfil = false" class="relative">
                        <button class="flex items-center gap-1 hover:text-blue-600 focus:outline-none py-4">
                            <span>Profil</span>
                            <svg class="w-4 h-4 transition-transform" :class="openProfil ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="openProfil" x-cloak x-transition class="absolute left-0 top-full w-60 bg-white border border-gray-100 shadow-xl rounded-b-xl py-2">
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-blue-50">Sambutan</a>
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-blue-50">Pimpinan</a>
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-blue-50">Sejarah</a>
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-blue-50 text-nowrap">Struktur Organisasi</a>
                        </div>
                    </div>

                    <div x-data="{ openLayanan: false }" @mouseenter="openLayanan = true" @mouseleave="openLayanan = false" class="relative">
                        <button class="flex items-center gap-1 hover:text-blue-600 focus:outline-none py-4">
                            <span>Layanan</span>
                            <svg class="w-4 h-4 transition-transform" :class="openLayanan ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="openLayanan" x-cloak x-transition class="absolute left-0 top-full w-64 bg-white border border-gray-100 shadow-xl rounded-b-xl py-2">
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-blue-50">Kasi Pemerintah</a>
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-blue-50">Kasi Ekonomi Pembangunan</a>
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-blue-50">Kasi Kesra</a>
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-blue-50">Kasi Tantrib</a>
                        </div>
                    </div>

                    <a href="#" class="hover:text-blue-600 transition">Berita</a>
                    <a href="#" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition shadow-sm">Kontak</a>
                </div>

                <div class="flex md:hidden z-[110]">
                    <button @click="open = !open" type="button" 
                            class="p-2.5 rounded-lg bg-gray-50 text-blue-900 border border-gray-200 focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                        <span class="sr-only">Buka Menu</span>
                        <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                        <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div x-show="open" 
                 x-cloak 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-5"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="md:hidden absolute top-full left-0 w-full bg-white border-b border-gray-200 shadow-xl px-4 py-6 space-y-4 font-semibold overflow-y-auto max-h-[80vh]">
                
                <a href="#" class="block p-3 text-gray-700 hover:bg-blue-50 rounded-lg transition">Beranda</a>
                
                <div x-data="{ subProfil: false }">
                    <button @click="subProfil = !subProfil" class="flex justify-between items-center w-full p-3 text-gray-700 hover:bg-blue-50 rounded-lg transition">
                        <span>Profil</span>
                        <svg class="w-4 h-4 transition-transform" :class="subProfil ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="subProfil" x-cloak class="pl-6 space-y-2 mt-2 border-l-2 border-blue-500 ml-4">
                        <a href="#" class="block py-2 text-sm text-gray-600 hover:text-blue-600">Sambutan</a>
                        <a href="#" class="block py-2 text-sm text-gray-600 hover:text-blue-600">Pimpinan</a>
                        <a href="#" class="block py-2 text-sm text-gray-600 hover:text-blue-600">Struktur Organisasi</a>
                    </div>
                </div>

                <div x-data="{ subLayanan: false }">
                    <button @click="subLayanan = !subLayanan" class="flex justify-between items-center w-full p-3 text-gray-700 hover:bg-blue-50 rounded-lg transition">
                        <span>Layanan</span>
                        <svg class="w-4 h-4 transition-transform" :class="subLayanan ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="subLayanan" x-cloak class="pl-6 space-y-2 mt-2 border-l-2 border-blue-500 ml-4">
                        <a href="#" class="block py-2 text-sm text-gray-600 hover:text-blue-600">Kasi Pemerintah</a>
                        <a href="#" class="block py-2 text-sm text-gray-600 hover:text-blue-600">Kasi Ekonomi Pembangunan</a>
                        <a href="#" class="block py-2 text-sm text-gray-600 hover:text-blue-600">Kasi Kesra</a>
                        <a href="#" class="block py-2 text-sm text-gray-600 hover:text-blue-600">Kasi Tantrib</a>
                    </div>
                </div>

                <a href="#" class="block p-3 text-gray-700 hover:bg-blue-50 rounded-lg transition">Berita</a>
                <a href="#" class="block w-full bg-blue-600 text-white text-center py-3.5 rounded-xl font-bold shadow-lg shadow-blue-200">Kontak Kami</a>
            </div>
        </div>
    </nav>

    <main class="pt-24"> 
        @yield('content')
    </main>

    <footer class="bg-blue-950 text-white pt-16 pb-8 mt-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 border-b border-blue-900 pb-12 text-center md:text-left">
                <div>
                    <h2 class="text-2xl font-bold mb-4">Kecamatan Kota</h2>
                    <p class="text-blue-200">Melayani dengan integritas untuk masyarakat yang lebih baik.</p>
                </div>
                <div>
                    <h3 class="font-bold mb-4 text-blue-400">Tautan</h3>
                    <ul class="space-y-2 text-blue-100 text-sm">
                        <li><a href="#" class="hover:text-white transition">Agenda Kegiatan</a></li>
                        <li><a href="#" class="hover:text-white transition">E-Layanan</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4 text-blue-400">Kontak</h3>
                    <p class="text-blue-100 text-sm italic leading-relaxed">Jl. Pemerintah No. 01, Kota Kabupaten</p>
                </div>
            </div>
            <p class="text-center text-sm text-blue-400 mt-8">&copy; 2026 Pemerintah Kabupaten.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => { AOS.init({ duration: 800, once: true }); });
    </script>
</body>
</html>