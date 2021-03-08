<?php

namespace Lamantin\App\http\controllers;

use Lamantin\App\components\Csrf;
use Lamantin\App\core\View;

/**
 * Class Register
 * @package Lamantin\App\http\controllers
 * @author qnstdx
 */
class Register
{
    /**
     * @throws \Exception
     * @return void
     */
    public function registerPage(): void
    {
        View::render('register');
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
    ): void {
        Csrf::match($token);
        (new \Lamantin\App\models\Register())->register(
            $name,
            $email,
            (string) password_hash($password, PASSWORD_DEFAULT)
        );
    }
}
