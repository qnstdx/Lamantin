<?php

namespace Lamantin\App\http\controllers;

use Lamantin\App\components\csrf;
use Lamantin\App\core\view;

/**
 * Class Login
 * @package Lamantin\App\http\controllers
 * @author Jolydev <superduperproger@gmail.com>
 */
class Login
{
    /**
     * @throws \Exception
     * @return void
     */
    public function loginPage(): void
    {
        View::render('login');
    }

    /**
     * @return void
     */
    public function loginPost(): void
    {
        Csrf::match($_POST['CSRF-TOKEN']);
        if ((new \Lamantin\App\models\login())->login(
            $_POST['email'],
            $_POST['password']) !== true
        ) {
            echo 'Incorrect password or email!';
        }
    }
}