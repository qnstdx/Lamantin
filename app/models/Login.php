<?php

namespace Lamantin\App\models;

use Lamantin\App\core\model;
use Lamantin\App\models\tables\Users;

/**
 * Class Login
 * @package Lamantin\App\models
 * @author Jolydev <superduperproger@gmail.com>
 */
class Login extends model
{
    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password): bool
    {
        if ($this->findEmail($email) > 0 && $this->findPassword($password) === true) {
            $token = md5($email . $password . time());

            $tok = Users::where('email', '=', $email)->first();
            $tok->token = $token;
            $tok->save();

            setcookie('t', $token, time() + 1296000);
            header('Location: /home');

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $email
     * @return int
     */
    public function findEmail(string $email): int
    {
        return Users::where('email', $email)->count();
    }

    /**
     * @param string $password
     * @return bool
     */
    private function findPassword(string $password): bool
    {
        $user = Users::where('password', $password)->get()->toArray();

        if (!empty($user)) {
            return password_verify($password, $user[0]['password']) === true;
        } else {
            return false;
        }
    }
}