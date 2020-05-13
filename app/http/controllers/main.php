<?php

namespace Lamantin\App\http\controllers;

use Lamantin\App\core\view;

class main
{
    public function mainPage(): void
    {
        view::render('main', [
            'name' => 'Nikita'
        ]);
    }
}