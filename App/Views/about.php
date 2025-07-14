<?php
/**
 * Файл view: информация «О приложении» в стиле "Фиолетовый"
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О FillFunds - Система бухгалтерского учета</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        
        /* Dark theme styles */
        .dark {
            color-scheme: dark;
        }
        .dark body {
            background-color: #0f172a;
            color: #f1f5f9;
        }
        .dark header {
            background-color: #1e293b;
            border-bottom: 1px solid #334155;
        }
        .dark .bg-white {
            background-color: #1e293b;
        }
        .dark .bg-gray-50 {
            background-color: #0f172a;
        }
        .dark .bg-gray-900 {
            background-color: #020617;
        }
        .dark .text-gray-900 {
            color: #f1f5f9;
        }
        .dark .text-gray-600 {
            color: #94a3b8;
        }
        .dark .text-gray-400 {
            color: #64748b;
        }
        .dark .border-gray-200 {
            border-color: #334155;
        }
        .dark .shadow-sm {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
        }
        .dark .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-lg">F</span>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900">FillFunds</h1>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Главная</a>
                    <a href="/expenses" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Расходы</a>
                    <a href="/incomes" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Доходы</a>
                    <a href="/accounts" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Счета</a>
                </nav>
                <div class="flex items-center space-x-3">
                    <a href="/login" class="px-4 py-2 text-blue-600 font-medium hover:bg-blue-50 rounded-lg transition-colors">Войти</a>
                    <a href="/register" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">Регистрация</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-6">О нашем бухгалтерском<br>приложении</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Наше решение на PHP — простой способ контролировать доходы и расходы вашего бизнеса с помощью современного и интуитивно понятного интерфейса.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- What is this app -->
        <section class="mb-20">
            <div class="bg-white rounded-2xl shadow-lg p-8 card-hover">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Что это за приложение?</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Это веб-приложение создано для простого и понятного ведения бухгалтерии. Вы сможете:
                </p>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-blue-500 rounded-full flex-shrink-0 flex items-center justify-center mt-1">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600">Добавлять доходы и расходы с указанием категорий, дат и заметок</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-blue-500 rounded-full flex-shrink-0 flex items-center justify-center mt-1">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600">Формировать и скачивать отчёты: баланс, прибыли и убытки</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-blue-500 rounded-full flex-shrink-0 flex items-center justify-center mt-1">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600">Настраивать права доступа: администратор, бухгалтер, пользователь</p>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-blue-500 rounded-full flex-shrink-0 flex items-center justify-center mt-1">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600">Работать в современном интерфейсе на JavaScript (ES6)</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How to start -->
        <section class="mb-20">
            <div class="bg-white rounded-2xl shadow-lg p-8 card-hover">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Как начать работу?</h2>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">1</div>
                        <p class="text-lg text-gray-600">Зарегистрируйтесь или войдите в систему</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">2</div>
                        <p class="text-lg text-gray-600">Откройте раздел «Приход/Расход» и создайте первую запись</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">3</div>
                        <p class="text-lg text-gray-600">Ознакомьтесь с разделом «Отчёты»</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">4</div>
                        <p class="text-lg text-gray-600">Настройте категории в меню «Настройки»</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section class="mb-20">
            <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">Почему выбирают нас?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-blue-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Интуитивный интерфейс</h3>
                    <p class="text-gray-600">Никаких сложностей — всё нужное под рукой. Современный дизайн и удобная навигация.</p>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-green-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Адаптивность</h3>
                    <p class="text-gray-600">Одинаково удобно на ПК, планшете и телефоне. Responsive дизайн для всех устройств.</p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-violet-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-purple-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Надёжность</h3>
                    <p class="text-gray-600">Ваши данные защищены современными методами шифрования и резервного копирования.</p>
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section class="mb-20">
            <div class="bg-white rounded-2xl shadow-lg p-8 card-hover">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Свяжитесь с нами</h2>
                <p class="text-lg text-gray-600 mb-6">Если у вас остались вопросы — напишите или позвоните:</p>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Email</p>
                            <a href="mailto:support@fillfunds.ru" class="text-blue-600 hover:text-blue-700 transition-colors">support@fillfunds.ru</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Телефон</p>
                            <a href="tel:+74951234567" class="text-green-600 hover:text-green-700 transition-colors">+7 (495) 123-45-67</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Back to home -->
        <div class="text-center">
            <a href="/" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Вернуться на главную
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-lg">F</span>
                    </div>
                    <h4 class="text-xl font-bold">FillFunds</h4>
                </div>
                <p class="text-gray-400">&copy; 2025 FillFunds. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <script type="module">
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
