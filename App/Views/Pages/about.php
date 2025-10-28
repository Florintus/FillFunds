<?php
/**
 * Файл view: информация «О приложении»
 * Этот файл содержит ТОЛЬКО уникальный контент для страницы "О нас".
 * Он будет вставлен в главный шаблон layout.php.
 */

// Устанавливаем заголовок для этой конкретной страницы. 
// Переменная $title будет использована в <title> внутри layout.php
$title = 'О приложении FillFunds'; 
?>

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
                <!-- Содержимое блока... -->
                <div class="flex items-start space-x-3">
                    <div class="w-6 h-6 bg-blue-500 rounded-full flex-shrink-0 flex items-center justify-center mt-1">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </div>
                    <p class="text-gray-600">Добавлять доходы и расходы с указанием категорий, дат и заметок</p>
                </div>
                <!-- ... и остальные пункты ... -->
            </div>
        </div>
    </section>

    <!-- How to start -->
    <section class="mb-20">
        <div class="bg-white rounded-2xl shadow-lg p-8 card-hover">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Как начать работу?</h2>
            <div class="space-y-4">
                 <!-- Содержимое блока... -->
                 <div class="flex items-center space-x-4">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">1</div>
                    <p class="text-lg text-gray-600">Зарегистрируйтесь или войдите в систему</p>
                </div>
                 <!-- ... и остальные пункты ... -->
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="mb-20">
        <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">Почему выбирают нас?</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Содержимое карточек... -->
        </div>
    </section>

    <!-- Contact -->
    <section class="mb-20">
        <div class="bg-white rounded-2xl shadow-lg p-8 card-hover">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Свяжитесь с нами</h2>
            <!-- Содержимое блока... -->
        </div>
    </section>

    <!-- Back to home -->
    <div class="text-center">
        <a href="/" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Вернуться на главную
        </a>
    </div>
</main>