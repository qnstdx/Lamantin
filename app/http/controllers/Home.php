<?php

namespace Lamantin\App\http\controllers;

use Lamantin\App\core\View;

/**
 * Class Home
 * @package Lamantin\App\http\controllers
 * @author qnstdx
 */
class Home
{
    /**
     * @throws \Exception
     * @return void
     */
    public function homePage(): void
    {
        $model = new \Lamantin\App\models\Home();
        if (isAuth()) {
            view::render('home', [
                'data' => $model->get($_COOKIE['t'])[0]
            ]);
        } else {
            redirect('/');
        }
    }
}
