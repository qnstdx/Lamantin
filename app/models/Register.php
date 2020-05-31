<?php

namespace Lamantin\App\models;

use Lamantin\App\models\tables\Users;

/**
 * Class Register
 * @package Lamantin\App\models
 * @author Jolydev <superduperproger@gmail.com>
 */
class Register
{
    /**
     * @param string $username
     * @param string $email
     * @param string $password
     * @return void
     */
    public function register(string $username, string $email, string $password): void
    {
        $token = md5($email . $password . time());
        Users::create([
            'username' => $username,
            'token' => $token,
            'email' => $email,
            'password' => $password
        ]);
        
        setcookie('t', $token, time() + 1296000);
        header('Location: /home');
    }
}