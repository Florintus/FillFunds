export function initMobileMenu() {
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    const mobileClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileToggle?.addEventListener('click', () => {
        mobileMenu.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    mobileClose?.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
        document.body.style.overflow = '';
    });
}

export function initForms() {
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', () => {
            const btn = form.querySelector('button[type="submit"]');
            if (btn && !btn.disabled) {
                btn.disabled = true;
                btn.innerHTML = '<span class="inline-block w-4 h-4 mr-2 animate-spin rounded-full border-t-2 border-white"></span> Загрузка...';
            }
        });
    });
}