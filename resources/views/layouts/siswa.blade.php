<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Siswa')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @stack('styles')
</head>
<body>

    {{-- Tombol hamburger (mobile) --}}
    <button class="hamburger" id="hamburger">
        <i class="fa-solid fa-bars"></i>
    </button>

    {{-- Overlay gelap --}}
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    {{-- SIDEBAR --}}
    @include('layouts.sidebar-siswa')

    {{-- MAIN --}}
    <main class="main">
        <div class="topbar">@yield('topbar', 'Halaman Siswa')</div>
        <div class="content-wrapper">
            @yield('content')
        </div>
    </main>

    @stack('scripts')

    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script>
        const hamburger      = document.getElementById('hamburger');
        const sidebar        = document.querySelector('.sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        hamburger.addEventListener('click', () => {
            sidebar.classList.add('open');
            sidebarOverlay.classList.add('show');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('show');
        });

        document.querySelectorAll('.menu-link:not(.dropdown-toggle), .submenu li a').forEach(link => {
            link.addEventListener('click', () => {
                sidebar.classList.remove('open');
                sidebarOverlay.classList.remove('show');
            });
        });
    </script>
</body>
</html>