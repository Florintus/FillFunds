<?php

namespace App\Controllers;

use Core\BaseController;

class AboutController extends BaseController
{
    public function index()
    {
        $pageTitle = 'О приложении';
        $this->renderWithLayout('about', [
            'title' => $pageTitle
        ]);
    }
}