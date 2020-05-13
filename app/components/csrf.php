<?php
namespace Lamantin\App\components;

class csrf
{
    public static function get()
    {
        if (!isset($_SESSION['CSRF-TOKEN'])) {
            return (new csrf)->generate();
        } else {
            return $_SESSION['CSRF-TOKEN'];
        }
    }

    public static function match($tokenForm)
    {
        @session_start();
        if (!isset($tokenForm) && $tokenForm !== $_SESSION['CSRF-TOKEN']) {
            exit("#400 BAD REQUEST!");
        } else {
            (new csrf())->delete();
        }
    }

    private function generate()
    {
        @session_start();
        return $_SESSION['CSRF-TOKEN'] = substr(str_shuffle("qwerrtyuiop[]asdfghjkl'zxcvbnm,./QWERTYUIOPASDFGHJKLZXCVBNM1234567890!@#$%^&*()_+-="), 0, 25);
    }

    private function delete()
    {
        unset($_SESSION['CSRF-TOKEN']);
    }
}