<?php

namespace Lamantin\App\http\controllers;

use Lamantin\App\components\csrf;
use Lamantin\App\core\view;

class register
{
    public function registerPage()
    {
        view::render('register');
    }
    public function registerPost()
    {
        csrf::match($_POST['CSRF-TOKEN']);
        (new \Lamantin\App\models\register())->register($_POST['name'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT));
    }
}