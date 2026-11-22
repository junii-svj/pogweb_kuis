(() => {
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
})();
