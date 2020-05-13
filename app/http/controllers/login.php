<?php

namespace Lamantin\App\http\controllers;

use Lamantin\App\components\csrf;
use Lamantin\App\core\view;

class login
{
    public function loginPage()
    {
        view::render('login');
    }

    public function loginPost()
    {
        csrf::match($_POST['CSRF-TOKEN']);
        (new \Lamantin\App\http\models\login())->login($_POST['email'], $_POST['password']);
    }
}