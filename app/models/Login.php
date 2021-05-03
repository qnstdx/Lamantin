<?php

namespace Lamantin\App\models;

use Lamantin\App\core\Model;
use Lamantin\App\models\tables\Users;

/**
 * Class Login
 * @package Lamantin\App\models
 * @author qnstdx
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
        if ($this->confirmData($password, $email)) {
            $token = md5($email . $password . time());

            /** @phpstan-ignore-next-line */
            $tok = Users::where('email', '=', $email)->first();
            $tok->token = $token;
            $tok->save();

            setcookie('t', $token, time() + 1296000);
            redirect('/home');

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
     * @param string $email
     * @return bool
     */
    private function confirmData(string $password, string $email): bool
    {
        if (
            /** @phpstan-ignore-next-line */
            password_verify($password, Users::where('email', '=', $email)->first()->password)
            &&
            $this->findEmail($email) > 0
        ) {
            return true;
        } else {
            return false;
        }
    }
}
