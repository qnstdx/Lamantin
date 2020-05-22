<?php

namespace Lamantin\App\http\controllers;

use Lamantin\App\core\view;

class home
{
    public function homePage(): void
    {
        $model = new \Lamantin\App\models\home();
        if ($model->auth() === true) {
            view::render('home', [
                'data' => $model->get($_COOKIE['t'])[0]
            ]);
        }
    }
}