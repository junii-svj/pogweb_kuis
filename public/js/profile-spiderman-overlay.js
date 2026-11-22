(() => {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('[data-profile-photo]').forEach((photo) => {
        const overlay = photo.querySelector('[data-spiderman-overlay]');

        if (!overlay) {
            return;
        }

        photo.addEventListener('pointermove', (event) => {
            if (event.pointerType === 'touch') {
                return;
            }

            const bounds = photo.getBoundingClientRect();
            const horizontalPosition = (event.clientX - bounds.left) / bounds.width - 0.5;
            const verticalPosition = (event.clientY - bounds.top) / bounds.height - 0.5;
            const movement = prefersReducedMotion ? 0 : 8;

            photo.style.setProperty('--spider-shift-x', `${horizontalPosition * movement}px`);
            photo.style.setProperty('--spider-shift-y', `${verticalPosition * movement}px`);
            photo.classList.add('is-spiderman-active');
        });

        photo.addEventListener('pointerleave', () => {
            photo.classList.remove('is-spiderman-active');
            photo.style.removeProperty('--spider-shift-x');
            photo.style.removeProperty('--spider-shift-y');
        });
    });
})();
