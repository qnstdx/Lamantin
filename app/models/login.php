<?php

namespace Lamantin\App\models;

use Lamantin\App\core\model;
use Lamantin\App\models\tables\Users;

class login extends model
{
    public function login(string $email, string $password): bool
    {
        if ($this->count($email) > 0 && $this->match($email, $password) === true) {
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

    private function count(string $email): int
    {
        return Users::where('email', $email)->count();
    }

    private function match(string $email, string $password): bool
    {
        $user = Users::where('email', $email)->get()->toArray();

        if (!empty($user)) {
            return password_verify($password, $user[0]['password']) === true ? true : false;
        }
    }
}