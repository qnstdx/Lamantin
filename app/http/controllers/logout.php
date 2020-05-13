<?php
namespace Lamantin\App\http\controllers;

class logout
{
    public function logout(): void
    {
        setcookie('t', null, -(time() + 1296000));
        header('Location: /');
    }
}