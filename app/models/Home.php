<?php
namespace Lamantin\App\models;

use Lamantin\App\models\tables\Users;

/**
 * Class Home
 * @package Lamantin\App\models
 * @author Jolydev <superduperproger@gmail.com>
 */
class Home
{
    /**
     * @return bool
     */
    public function auth(): bool
    {
        return isset($_COOKIE['t']) === true;
    }

    /**
     * @param $token
     * @return array
     */
    public function get($token): array
    {
        return Users::where('token', $token)->get()->toArray();
    }
}