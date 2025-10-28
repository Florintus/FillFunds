<header class="sticky top-0 z-40 backdrop-blur-lg bg-white/90 dark:bg-slate-900/95 border-b border-gray-200 dark:border-slate-700">
    <div class="ff-container">
        <div class="header-container">
            <a href="/" class="logo">
                <span class="logo-icon">F</span>
                <span>FillFunds</span>
            </a>

            <nav class="hidden md:flex space-x-8">
                <ul>
                    <li><a href="#features">Возможности</a></li>
                    <li><a href="#about">О нас</a></li>
                    <li><a href="#pricing">Цены</a></li>
                    <li><a href="#contact">Контакты</a></li>
                </ul>
            </nav>

            <div class="actions hidden md:flex items-center gap-4">
                <label class="theme-toggle">
                    <input type="checkbox" id="theme-switch">
                    <span class="slider"></span>
                </label>
                <a href="/login" class="btn btn-outline">Войти</a>
                <a href="/register" class="btn btn-primary">Регистрация</a>
            </div>

            <button class="mobile-menu-btn" id="mobile-menu-toggle">☰</button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden" id="mobile-menu">
        <div class="mobile-menu-header">
            <span>Меню</span>
            <button class="mobile-menu-close" id="mobile-menu-close">×</button>
        </div>
        <ul class="mobile-nav">
            <li><a href="#features">Возможности</a></li>
            <li><a href="#about">О нас</a></li>
            <li><a href="#pricing">Цены</a></li>
            <li><a href="#contact">Контакты</a></li>
            <li><a href="/login">Войти</a></li>
            <li><a href="/register">Регистрация</a></li>
        </ul>
    </div>
</header>