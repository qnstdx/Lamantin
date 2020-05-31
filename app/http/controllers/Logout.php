<?php

namespace Lamantin\App\http\controllers;

/**
 * Class Logout
 * @package Lamantin\App\http\controllers
 * @author Jolydev <superduperproger@gmail.com>
 */
class Logout
{
    /**
     * @return void
     */
    public function logout(): void
    {
        (new \Lamantin\App\models\Logout())->update((string) $_COOKIE['t']);

        /** @phpstan-ignore-next-line */
        setcookie('t', null, -(time() + 1296000));
        header('Location: /');
    }
}
