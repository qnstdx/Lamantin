<?php

namespace Lamantin\App\models;

use Lamantin\App\core\Model;
use Lamantin\App\models\tables\Users;

/**
 * Class Login
 * @package Lamantin\App\models
 * @author Jolydev <superduperproger@gmail.com>
 */
class Login extends Model
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

            /** @phpstan-ignore-next-line */
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
        /** @phpstan-ignore-next-line */
        return Users::where('email', $email)->count();
    }

    /**
     * @param string $password
     * @return bool
     */
    private function findPassword(string $password): bool
    {
        /** @phpstan-ignore-next-line */
        $user = Users::where('password', $password)->get()->toArray();

        if (!empty($user)) {
            return password_verify($password, $user[0]['password']) === true;
        } else {
            return false;
        }
    }
}