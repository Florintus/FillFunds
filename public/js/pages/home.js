document.addEventListener('DOMContentLoaded', () => {
    // Анимация при скролле
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-in, .slide-up, .scale-in').forEach(el => {
        el.style.opacity = 0;
        el.style.transform = 'translateY(20px)';
        observer.observe(el);
    });

    // Обработка формы регистрации
    const form = document.getElementById('registration-form');
    form?.addEventListener('submit', (e) => {
        e.preventDefault();
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;

        if (!name || !email || !password) {
            alert('Пожалуйста, заполните все поля');
            return;
        }

        // Здесь можно отправить данные на сервер
        alert('Спасибо за регистрацию!');
        form.reset();
    });
});