<?php
namespace Lamantin\App\models;

use Lamantin\App\models\tables\Users;

class home
{
    public function auth(): bool
    {
        return isset($_COOKIE['t']) === true ? true : false;
    }

    public function get($token): array
    {
        return Users::where('token', $token)->get()->toArray();
    }
}