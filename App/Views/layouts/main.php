<?php
/**
 * FillFunds - Main Layout Template
 * Основной шаблон для всех страниц приложения
 */
    $pageTitle = $pageTitle ?? 'FillFunds - Умная система бухгалтерского учета';
    $pageDescription = $pageDescription ?? 'Современное решение для ведения бухгалтерского учета малого и среднего бизнеса';
    $pageCSS = $pageCSS ?? [];
    $pageScripts = $pageScripts ?? [];
    $showBreadcrumbs = $showBreadcrumbs ?? true;
    $isAuthenticated = $isAuthenticated ?? false;
    $user = $user ?? null;
    $bodyClass = $bodyClass ?? '';
?>
<!DOCTYPE html>
<html lang="ru" class="<?= ($isAuthenticated ? 'auth' : 'guest') . ($bodyClass ? ' ' . $bodyClass : '') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO Meta Tags -->
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
    <meta name="keywords" content="бухгалтерия, учет, финансы, малый бизнес, FillFunds">
    <meta name="author" content="FillFunds">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>">
    <meta property="og:url" content="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
    <meta property="og:site_name" content="FillFunds">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="twitter:description" content="<?= htmlspecialchars($pageDescription) ?>">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com ">
    <link rel="preconnect" href="https://fonts.gstatic.com " crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css?v=<?= file_exists($_SERVER['DOCUMENT_ROOT'].'/css/main.css') ? filemtime($_SERVER['DOCUMENT_ROOT'].'/css/main.css') : time() ?>">

    <!-- Page-specific CSS -->
    <?php if (!empty($pageCSS)): ?>
        <?php foreach ($pageCSS as $css): ?>
            <link rel="stylesheet" href="<?= $css ?>?v=<?= file_exists($_SERVER['DOCUMENT_ROOT'] . $css) ? filemtime($_SERVER['DOCUMENT_ROOT'] . $css) : time() ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    </head>
<body class="bg-primary text-primary <?= $bodyClass ?>">
    <a href="#main-content" class="sr-only focus:not-sr-only fixed top-4 left-4 bg-indigo-600 text-white px-4 py-2 rounded-lg z-50">
        Перейти к основному содержанию
    </a>

    <!-- Header -->
    <?php include __DIR__ . '/../Partials/header.php'; ?>

    <!-- Breadcrumbs -->
    <?php if ($showBreadcrumbs): ?>
        <?php include __DIR__ . '/../Partials/breadcrumbs.php'; ?>
    <?php endif; ?>

    <!-- Main Content -->
    <main id="main-content" role="main" class="flex-1">
        <?php if (isset($content)): ?>
            <?= $content ?>
        <?php else: ?>
            <div class="ff-container py-20 text-center">
                <h1 class="text-4xl font-bold mb-4">Страница не найдена</h1>
                <p class="text-secondary">Контент для этой страницы не был загружен.</p>
            </div>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <?php include __DIR__ . '/../Partials/footer.php'; ?>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="ff-back-to-top" aria-label="Вернуться наверх">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <!-- Loading Overlay
    <div id="loading-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white dark:bg-slate-800 rounded-xl p-6 flex items-center gap-4">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
            <span class="text-gray-800 dark:text-slate-300">Загрузка...</span>
        </div>
    </div> -->

    <!-- Page Scripts -->
    <?php if (!empty($pageScripts)): ?>
        <?php foreach ($pageScripts as $script): ?>
            <script src="<?= $script ?>?v=<?= file_exists($_SERVER['DOCUMENT_ROOT'] . $script) ? filemtime($_SERVER['DOCUMENT_ROOT'] . $script) : time() ?>" type="module"></script>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Core App Script -->
    <script type="module" src="/js/core/app.js">
        // import * as FillFunds from '/js/core/app.js';
        // import { initTheme } from '/js/core/theme.js';
        // import { initMobileMenu } from '/js/core/helpers.js';
        
        // document.addEventListener('DOMContentLoaded', () => {
        //     FillFunds.init();
        //     initTheme();
        //     initMobileMenu();
        // });
    </script>

    <!-- Analytics -->
    <?php if (isset($_ENV['ANALYTICS_ID']) && $_ENV['ANALYTICS_ID']): ?>
    <script async src=" https://www.googletagmanager.com/gtag/js?id=<?= $_ENV['ANALYTICS_ID'] ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?= $_ENV['ANALYTICS_ID'] ?>');
    </script>
    <?php endif; ?>
</body>
</html>