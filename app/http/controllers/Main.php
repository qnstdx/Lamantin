<?php

namespace Lamantin\App\http\controllers;

use Lamantin\App\core\View;

/**
 * Class Main
 * @package Lamantin\App\http\controllers
 * @author Jolydev <superduperproger@gmail.com>
 */
class Main
{
    /**
     * @throws \Exception
     * @return void
     */
    public function mainPage(): void
    {
        View::render('main', [
            'name' => 'Nikita'
        ]);
    }
}
