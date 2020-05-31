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
     * @return false|mixed|string
     */
    public static function get()
    {
        if (!isset($_SESSION['CSRF-TOKEN'])) {
            return (new Csrf())->generate();
        } else {
            return $_SESSION['CSRF-TOKEN'];
        }
    }

    /**
     * @param string $tokenForm
     * @return void
     */
    public static function match(string $tokenForm): void
    {
        if ($tokenForm !== $_SESSION['CSRF-TOKEN']) {
            exit("#400 BAD REQUEST!");
        } else {
            (new Csrf())->delete();
        }
    }

    /**
     * @return string
     */
    private function generate(): string
    {
        $_SESSION['CSRF-TOKEN'] = substr(
            str_shuffle("qwerrtyuiop[]asdfghjkl'zxcvbnm,./QWERTYUIOPASDFGHJKLZXCVBNM1234567890!@#$%^&*()_+-="),
            0,
            25
        );

        return $_SESSION['CSRF-TOKEN'];
    }

    /**
     * @return void
     */
    private function delete(): void
    {
        unset($_SESSION['CSRF-TOKEN']);
    }
}
