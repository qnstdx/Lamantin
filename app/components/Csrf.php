<?php

namespace Lamantin\App\components;

/**
 * Class Csrf
 * @package Lamantin\App\components
 * @author Jolydev <superduperproger@gmail.com>
 */
class Csrf
{
    /**
     * Csrf constructor.
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * @return false|mixed|string
     */
    public static function get()
    {
        if (!isset($_SESSION['CSRF-TOKEN'])) {
            return (new Csrf)->generate();
        } else {
            return $_SESSION['CSRF-TOKEN'];
        }
    }

    /**
     * @param string $tokenForm
     */
    public static function match(string $tokenForm)
    {
        if (!isset($tokenForm) && $tokenForm !== $_SESSION['CSRF-TOKEN']) {
            exit("#400 BAD REQUEST!");
        } else {
            (new Csrf())->delete();
        }
    }

    /**
     * @return false|string
     */
    private function generate()
    {
        return $_SESSION['CSRF-TOKEN'] = substr(str_shuffle("qwerrtyuiop[]asdfghjkl'zxcvbnm,./QWERTYUIOPASDFGHJKLZXCVBNM1234567890!@#$%^&*()_+-="), 0, 25);
    }

    /**
     * @return void
     */
    private function delete(): void
    {
        unset($_SESSION['CSRF-TOKEN']);
    }
}