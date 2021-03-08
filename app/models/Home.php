<?php

namespace Lamantin\App\models;

use Lamantin\App\models\tables\Users;

/**
 * Class Home
 * @package Lamantin\App\models
 * @author qnstdx
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
     * @param string $token
     * @return array
     */
    public function get(string $token): array
    {
        /** @phpstan-ignore-next-line */
        return Users::where('token', $token)->get()->toArray();
    }
}
