<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judulHalaman ?? 'Portofolio' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="navbar">
        <div class="nav-container">
            <div class="nav-left">
                <a href="{{ url('/') }}" class="brand-logo" aria-label="Home">
                    <svg width="22" height="20" viewBox="0 0 76 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M37.5274 0L75.0548 65H0L37.5274 0Z" fill="#ffffff"/>
                    </svg>
                </a>
                <ul class="nav-links">
                    <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Homepage</a></li>
                    <li><a href="{{ url('/profil') }}" class="{{ request()->is('profil') ? 'active' : '' }}">Profil Diri</a></li>
                    <li><a href="{{ url('/galeri') }}" class="{{ request()->is('galeri') ? 'active' : '' }}">Galeri Foto</a></li>
                </ul>
            </div>
            <div class="nav-right">
                <a href="https://www.instagram.com/aristyyyo_?mdxt=MWpzY3JrZG1tb2R1dA==" class="btn-nav-outline">Contact Saya</a>
                <a href="https://github.com/junii-svj" class="btn-nav-solid">GitHub</a>
            </div>
        </div>
    </header>
    <main class="main-wrapper">