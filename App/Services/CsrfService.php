<?php

namespace App\Services;

class CSRFService
{
    private const TOKEN_KEY = '_csrf_token';

    // Генерация и сохранение CSRF токена в сессии
    public static function generateToken(): string
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $token = bin2hex(random_bytes(32));
        $_SESSION[self::TOKEN_KEY] = $token;
        return $token;
    }

    // Получение текущего токена (если нужно использовать в форме)
    public static function getToken(): ?string
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        return $_SESSION[self::TOKEN_KEY] ?? null;
    }

    // Проверка CSRF токена
    public static function validateToken(?string $token): bool
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        return isset($_SESSION[self::TOKEN_KEY]) && hash_equals($_SESSION[self::TOKEN_KEY], $token);
    }
}
