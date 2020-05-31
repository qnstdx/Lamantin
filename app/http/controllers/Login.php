<?php

namespace Lamantin\App\http\controllers;

use Lamantin\App\components\Csrf;
use Lamantin\App\core\View;

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
     * @param string $email
     * @param string $password
     * @return void
     */
    public function loginPost(string $email, string $password): void
    {
        Csrf::match($_POST['CSRF-TOKEN']);
        if (
            (new \Lamantin\App\models\Login())->login(
                $email,
                $password
            ) !== true
        ) {
            echo 'Incorrect password or email!';
        }
    }
}
