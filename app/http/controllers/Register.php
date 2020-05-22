<?php

namespace Lamantin\App\http\controllers;

use Lamantin\App\components\csrf;
use Lamantin\App\core\view;

/**
 * Class Register
 * @package Lamantin\App\http\controllers
 * @author Jolydev <superduperproger@gmail.com>
 */
class Register
{
    /**
     * @throws \Exception
     * @return void
     */
    public function registerPage(): void
    {
        view::render('register');
    }

    /**
     * @return void
     */
    public function registerPost(): void
    {
        csrf::match($_POST['CSRF-TOKEN']);
        (new \Lamantin\App\models\register())->register(
            $_POST['name'],
            $_POST['email'],
            password_hash($_POST['password'], PASSWORD_DEFAULT)
        );
    }
}