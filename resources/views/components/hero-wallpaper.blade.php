<div class="hero-media" aria-hidden="true">
    {{-- Wallpaper memakai HTML/Canvas lokal; pertahankan public/video/license.txt saat mengganti aset. --}}
    <img class="hero-wallpaper-fallback" src="{{ asset('img/placeholders/hero-poster.svg') }}" alt="">
    <iframe
        class="hero-wallpaper"
        title="Animasi latar geometris interaktif"
        tabindex="-1"
        aria-hidden="true"
        data-wallpaper-src="{{ asset('video/triangle.html') }}"
        data-hero-wallpaper
    ></iframe>
</div>
