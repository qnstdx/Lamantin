<?php

namespace Lamantin\App\http\controllers;

use Lamantin\App\core\view;

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
        view::render('main', [
            'name' => 'Nikita'
        ]);
    }
}