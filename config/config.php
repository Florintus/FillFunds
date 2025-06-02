<?php

namespace Config;

class AppConfig
{
    private static array $settings = [
        'db' => [
            'host' => '127.127.126.13',
            'user' => 'florintus',
            'password' => '12345',
            'dbname' => 'FinancyBD',
            'port' => 5432,
        ],
        'app' => [
            'debug' => true,
            'base_url' => 'http://localhost',
        ],
    ];

    public static function get(string $key, $default = null)
    {
        $keys = explode('.', $key);
        $value = self::$settings;

        foreach ($keys as $k) {
            if (!isset($value[$k])) {
                return $default;
            }
            $value = $value[$k];
        }

        return $value;
    }
}
    