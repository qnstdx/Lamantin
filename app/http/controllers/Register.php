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
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $token
     */
    public function registerPost(
        string $name,
        string $email,
        string $password,
        string $token
    ): void
    {
        csrf::match($token);
        (new \Lamantin\App\models\register())->register(
            $name,
            $email,
            password_hash($password, PASSWORD_DEFAULT)
        );
    }
}