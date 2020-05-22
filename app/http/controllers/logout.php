<?php
namespace Lamantin\App\http\controllers;

class logout
{
    public function logout(): void
    {
        (new \Lamantin\App\models\logout())->update((string) $_COOKIE['t']);
        setcookie('t', null, -(time() + 1296000));
        header('Location: /');
    }
}