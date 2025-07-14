<?php
/**
 * Современный подвал для FillFunds
 * Адаптивный и информативный footer с поддержкой темной темы
 */
?>

<!-- Footer -->
<footer class="bg-gray-900 text-white mt-auto">
    <!-- Main Footer Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Brand and Description -->
            <div class="lg:col-span-1">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-lg">F</span>
                    </div>
                    <h4 class="text-xl font-bold">FillFunds</h4>
                </div>
                <p class="text-gray-400 mb-6 leading-relaxed">
                    Современное решение для ведения бухгалтерского учета малого и среднего бизнеса. 
                    Упростите финансовое планирование с помощью наших инструментов.
                </p>
                
                <!-- Social Links -->
                <div class="flex space-x-4">
                    <?php 
                    $socialLinks = [
                        ['name' => 'Telegram', 'url' => '#', 'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69a.2.2 0 00-.05-.18c-.06-.05-.14-.03-.21-.02-.09.02-1.49.95-4.22 2.79-.4.27-.76.41-1.08.4-.36-.01-1.04-.2-1.55-.37-.63-.2-1.13-.31-1.09-.65.02-.18.27-.36.74-.55 2.92-1.27 4.86-2.11 5.83-2.51 2.78-1.16 3.35-1.36 3.73-1.36.08 0 .27.02.39.12.1.08.13.19.14.27-.01.06-.01.24-.01.24z'],
                        ['name' => 'WhatsApp', 'url' => '#', 'icon' => 'M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z'],
                        ['name' => 'VK', 'url' => '#', 'icon' => 'M15.684 0H8.316C1.592 0 0 1.592 0 8.316v7.368C0 22.408 1.592 24 8.316 24h7.368C22.408 24 24 22.408 24 15.684V8.316C24 1.592 22.408 0 15.684 0zm3.692 17.123h-1.744c-.66 0-.864-.525-2.05-1.727-1.033-1.01-1.49-.908-1.74-.908-.356 0-.458.102-.458.593v1.575c0 .424-.135.678-1.253.678-1.846 0-3.896-1.118-5.335-3.202C4.624 10.857 4.03 8.57 4.03 8.096c0-.254.102-.489.593-.489h1.744c.441 0 .61.203.78.678.864 2.49 2.303 4.675 2.896 4.675.22 0 .322-.102.322-.66V9.721c-.068-1.186-.695-1.287-.695-1.71 0-.204.169-.407.441-.407h2.744c.373 0 .508.203.508.643v3.473c0 .372.169.508.271.508.22 0 .407-.136.813-.542 1.254-1.406 2.151-3.574 2.151-3.574.119-.254.322-.489.763-.489h1.744c.525 0 .644.271.525.643-.22 1.017-2.354 4.031-2.354 4.031-.186.305-.254.44 0 .763.186.254.796.78 1.203 1.253.745.847 1.322 1.558 1.457 2.05.136.491-.068.744-.559.744z'],
                        ['name' => 'Email', 'url' => 'mailto:support@fillfunds.ru', 'icon' => 'M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z']
                    ];
                    ?>
                    <?php foreach ($socialLinks as $social): ?>
                    <a href="<?= htmlspecialchars($social['url']) ?>" 
                       class="w-10 h-10 bg-gray-800 hover:bg-gradient-to-br hover:from-blue-500 hover:to-purple-600 rounded-lg flex items-center justify-center transition-all duration-300 transform hover:scale-105" 
                       title="<?= htmlspecialchars($social['name']) ?>"
                       target="<?= $social['name'] === 'Email' ? '_self' : '_blank' ?>"
                       rel="<?= $social['name'] !== 'Email' ? 'noopener noreferrer' : '' ?>">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="<?= $social['icon'] ?>"/>
                        </svg>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h5 class="font-semibold text-lg mb-4">Навигация</h5>
                <ul class="space-y-3">
                    <?php 
                    $quickLinks = [
                        ['title' => 'Главная', 'url' => '/'],
                        ['title' => 'Расходы', 'url' => '/expenses'],
                        ['title' => 'Доходы', 'url' => '/incomes'],
                        ['title' => 'Счета', 'url' => '/accounts'],
                        ['title' => 'Категории', 'url' => '/categories'],
                        ['title' => 'История', 'url' => '/logs']
                    ];
                    ?>
                    <?php foreach ($quickLinks as $link): ?>
                    <li>
                        <a href="<?= htmlspecialchars($link['url']) ?>" 
                           class="text-gray-400 hover:text-white transition-colors duration-200 flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <?= htmlspecialchars($link['title']) ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Support and Help -->
            <div>
                <h5 class="font-semibold text-lg mb-4">Поддержка</h5>
                <ul class="space-y-3">
                    <?php 
                    $supportLinks = [
                        ['title' => 'Центр поддержки', 'url' => '/support'],
                        ['title' => 'Документация', 'url' => '/docs'],
                        ['title' => 'FAQ', 'url' => '/faq'],
                        ['title' => 'Видеоуроки', 'url' => '/tutorials'],
                        ['title' => 'Системные требования', 'url' => '/requirements'],
                        ['title' => 'Статус системы', 'url' => '/status']
                    ];
                    ?>
                    <?php foreach ($supportLinks as $link): ?>
                    <li>
                        <a href="<?= htmlspecialchars($link['url']) ?>" 
                           class="text-gray-400 hover:text-white transition-colors duration-200 flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <?= htmlspecialchars($link['title']) ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contact Information -->
            <div>
                <h5 class="font-semibold text-lg mb-4">Контакты</h5>
                <div class="space-y-4">
                    <!-- Email -->
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-300">Email</p>
                            <a href="mailto:support@fillfunds.ru" class="text-gray-400 hover:text-white transition-colors">
                                support@fillfunds.ru
                            </a>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-300">Телефон</p>
                            <a href="tel:+74951234567" class="text-gray-400 hover:text-white transition-colors">
                                +7 (495) 123-45-67
                            </a>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-purple-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-300">Адрес</p>
                            <p class="text-gray-400 text-sm leading-relaxed">
                                г. Москва, ул. Примерная, д. 123<br>
                                БЦ "Технопарк", офис 456
                            </p>
                        </div>
                    </div>

                    <!-- Working Hours -->
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-orange-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-300">Режим работы</p>
                            <p class="text-gray-400 text-sm">
                                Пн-Пт: 9:00 - 18:00<br>
                                Сб-Вс: выходной
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <!-- Copyright -->
                <div class="flex items-center space-x-4">
                    <p class="text-gray-400 text-sm">
                        &copy; <?= date('Y') ?> FillFunds. Все права защищены.
                    </p>
                    <div class="hidden md:flex items-center space-x-2 text-xs text-gray-500">
                        <span>Версия 2.1.0</span>
                        <span>•</span>
                        <span>Build <?= date('Y.m.d') ?></span>
                    </div>
                </div>

                <!-- Legal Links -->
                <div class="flex flex-wrap justify-center md:justify-end space-x-6 text-sm">
                    <?php 
                    $legalLinks = [
                        ['title' => 'Политика конфиденциальности', 'url' => '/privacy'],
                        ['title' => 'Условия использования', 'url' => '/terms'],
                        ['title' => 'Пользовательское соглашение', 'url' => '/agreement'],
                        ['title' => 'Cookie', 'url' => '/cookies']
                    ];
                    ?>
                    <?php foreach ($legalLinks as $index => $link): ?>
                        <?php if ($index > 0): ?>
                            <span class="text-gray-600">•</span>
                        <?php endif; ?>
                        <a href="<?= htmlspecialchars($link['url']) ?>" 
                           class="text-gray-400 hover:text-white transition-colors duration-200">
                            <?= htmlspecialchars($link['title']) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Security Badge -->
    <div class="border-t border-gray-700 bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col sm:flex-row items-center justify-between text-sm text-gray-400">
                <div class="flex items-center space-x-4 mb-2 sm:mb-0">
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span>SSL защищено</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <span>GDPR соответствие</span>
                    </div>
                </div>
                <div class="text-xs">
                    Сделано с ❤️ для российского бизнеса
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button id="back-to-top" 
        class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 z-40 hidden">
    <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
    </svg>
</button>

<!-- Footer JavaScript -->
<script type="module">
    // Back to top functionality
    const backToTopButton = document.getElementById('back-to-top');
    
    // Show/hide back to top button based on scroll position
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.remove('hidden');
        } else {
            backToTopButton.classList.add('hidden');
        }
    });
    
    // Smooth scroll to top
    backToTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Newsletter form submission (if exists)
    const newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            
            // Here you would typically send the email to your backend
            console.log('Newsletter subscription:', email);
            
            // Show success message
            const button = this.querySelector('button');
            const originalText = button.textContent;
            button.textContent = 'Подписка оформлена!';
            button.classList.add('bg-green-600');
            
            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('bg-green-600');
                this.reset();
            }, 3000);
        });
    }

    // External links security
    document.querySelectorAll('a[target="_blank"]').forEach(link => {
        if (!link.rel.includes('noopener')) {
            link.rel += ' noopener noreferrer';
        }
    });

    // Footer animations on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);

    // Observe footer sections for animation
    document.querySelectorAll('footer > div > div > div').forEach(section => {
        observer.observe(section);
    });
</script>

<!-- Additional CSS for animations -->
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }

    /* Smooth hover effects for social icons */
    footer a[title]:hover {
        transform: translateY(-2px);
    }

    /* Dark theme adjustments for footer */
    .dark footer {
        background-color: #020617;
        border-color: #1e293b;
    }

    .dark footer .border-gray-700 {
        border-color: #334155;
    }

    .dark footer .bg-gray-800 {
        background-color: #0f172a;
    }
</style>

</body>
</html>
