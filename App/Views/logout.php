<?php
session_start();

// Удаляем все данные сессии
$_SESSION = [];

// Уничтожаем сессию на сервере
session_destroy();

// Перенаправляем на страницу входа
header('Location: /login.php');
exit;
