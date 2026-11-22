@include('components.header')

<section class="hero-section" aria-labelledby="hero-title">
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
    <div class="hero-shade"></div>

    <div class="hero-content">
        <p class="hero-role">Mahasiswa Informatika · Artificial Intelligence · INSTIKI</p>
        <h1 id="hero-title">{{ $judulUtama }}</h1>
        <p class="hero-desc">{{ $deskripsi }}</p>
    </div>
    <span class="hero-caption">Informatika — Artificial Intelligence</span>
</section>

<section class="feature-section" aria-labelledby="feature-title">
    <div class="feature-copy">
        <p class="section-eyebrow">02 / Tentang saya</p>
        <h2 id="feature-title">Berangkat dari rasa ingin tahu.</h2>
        <p>{{ $deskripsi }}</p>
        <a href="{{ url('/profil') }}" class="button button-light">Selengkapnya <span aria-hidden="true">↗</span></a>
    </div>
    <figure class="feature-image">
        {{-- Foto lokal untuk highlight: ganti public/img/instiki.webp dengan foto landscape 4:3 atau 16:10. --}}
        <img src="{{ asset('img/insitki.jpg') }}" alt="Dokumentasi kegiatan di INSTIKI">
        <figcaption>INSTIKI Denpasar <span>Informatika · Artificial Intelligence</span></figcaption>
    </figure>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const hero = document.querySelector('.hero-section');
        const wallpaper = document.querySelector('[data-hero-wallpaper]');
        const fallback = document.querySelector('.hero-wallpaper-fallback');

        if (!hero || !wallpaper || !fallback) {
            return;
        }

        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            return;
        }

        const wallpaperUrl = wallpaper.dataset.wallpaperSrc;

        if (!wallpaperUrl) {
            console.error('Sumber wallpaper lokal belum ditentukan.');
            return;
        }

        const revealWallpaper = () => {
            const frameDocument = wallpaper.contentDocument;
            const container = frameDocument && frameDocument.getElementById('container');

            if (!container || !container.querySelector('canvas')) {
                return false;
            }

            wallpaper.classList.add('is-ready');
            fallback.hidden = true;
            return true;
        };

        wallpaper.addEventListener('load', () => {
            if (!revealWallpaper()) {
                console.warn('Wallpaper lokal tidak dapat dimuat; poster hero tetap ditampilkan.');
            }
        });
        wallpaper.src = wallpaperUrl;

        hero.addEventListener('pointermove', (event) => {
            if (!wallpaper.classList.contains('is-ready')) {
                return;
            }

            const frameWindow = wallpaper.contentWindow;
            const container = wallpaper.contentDocument && wallpaper.contentDocument.getElementById('container');

            if (!frameWindow || !container) {
                return;
            }

            const frameBounds = wallpaper.getBoundingClientRect();
            const mouseEvent = new frameWindow.MouseEvent('mousemove', {
                bubbles: true,
                clientX: event.clientX - frameBounds.left,
                clientY: event.clientY - frameBounds.top
            });

            container.dispatchEvent(mouseEvent);
        });
    });
</script>

@include('components.footer')
