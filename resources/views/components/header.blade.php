<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judulHalaman ?? 'Portofolio' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="navbar">
        <div class="nav-container">
            <button class="menu-toggle" type="button" aria-label="Buka menu navigasi" aria-expanded="false"
                aria-controls="primary-nav" data-menu-toggle>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </button>
            <a href="{{ url('/') }}" class="brand-logo" aria-label="Beranda I Komang Juni Aristiyo">
                <span class="brand-copy">
                    <strong></strong>
                </span>
            </a>
            <span class="nav-balance" aria-hidden="true"></span>
            <nav id="primary-nav" class="primary-nav" aria-label="Navigasi utama" hidden>
                <ul class="nav-links">
                    <li><a href="{{ url('/') }}" class="{{ request()->path() === '/' ? 'active' : '' }}"
                            @if(request()->path() === '/') aria-current="page" @endif>Home</a></li>
                    <li><a href="{{ url('/profil') }}" class="{{ request()->is('profil') ? 'active' : '' }}"
                            @if(request()->is('profil')) aria-current="page" @endif>Profil Diri</a></li>
                    <li><a href="{{ url('/galeri') }}" class="{{ request()->is('galeri') ? 'active' : '' }}"
                            @if(request()->is('galeri')) aria-current="page" @endif>Galeri Foto</a></li>
                    <li><a href="mailto:arisj9137@gmail.com" class="nav-contact">Hubungi Saya</a></li>
                    <li><a href="https://www.instagram.com/aristyyyo_/" class="nav-contact">Instagram saya</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <script>
        (() => {
            const menuToggle = document.querySelector('[data-menu-toggle]');
            const menu = document.getElementById('primary-nav');
            const navContainer = menuToggle && menuToggle.closest('.nav-container');
            const header = menuToggle && menuToggle.closest('.navbar');

            if (!menuToggle || !menu || !navContainer || !header) {
                return;
            }

            const setMenuOpen = (isOpen) => {
                menuToggle.setAttribute('aria-expanded', String(isOpen));
                menuToggle.setAttribute('aria-label', isOpen ? 'Tutup menu navigasi' : 'Buka menu navigasi');
                menu.hidden = !isOpen;
            };

            menuToggle.addEventListener('click', () => {
                setMenuOpen(menuToggle.getAttribute('aria-expanded') !== 'true');
            });

            menu.addEventListener('click', (event) => {
                if (event.target instanceof Element && event.target.closest('a')) {
                    setMenuOpen(false);
                }
            });

            document.addEventListener('pointerdown', (event) => {
                if (menuToggle.getAttribute('aria-expanded') === 'true' && !navContainer.contains(event.target)) {
                    setMenuOpen(false);
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && menuToggle.getAttribute('aria-expanded') === 'true') {
                    setMenuOpen(false);
                    menuToggle.focus();
                }
            });

            const updateHeaderVisibility = () => {
                const isScrolled = window.scrollY > 0;
                header.classList.toggle('is-hidden', isScrolled);

                if (isScrolled && menuToggle.getAttribute('aria-expanded') === 'true') {
                    setMenuOpen(false);
                }
            };

            window.addEventListener('scroll', updateHeaderVisibility, { passive: true });
            updateHeaderVisibility();
        })();
    </script>
    <main class="main-wrapper">