<?php

namespace Lamantin\App\http\models;

use Lamantin\App\core\model;
use Lamantin\App\http\models\tables\Users;

class login extends model
{
    public function login($email, $password)
    {
        if ($this->count($email) > 0 && $this->match($email, $password) === true) {
            $token = md5($email . $password . time());

            $tok = Users::where('email', '=', $email)->first();
            $tok->token = $token;
            $tok->save();

            setcookie('t', $token, time() + 1296000);
            header('Location: /home');
        }
    }

    private function count($email)
    {
        return Users::where('email', $email)->count();
    }

    private function match($email, $password): bool
    {
        $user = Users::where('email', $email)->get()->toArray();

        if (!empty($user)) {
            return password_verify($password, $user[0]['password']) === true ? true : false;
        }
    }
}