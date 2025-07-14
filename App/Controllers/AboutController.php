<?php

namespace App\Controllers;

class AboutController
{
    public function index()
    {
        $pageTitle = 'О приложении';
        include __DIR__ . '/../Views/about.php';
    }
}
