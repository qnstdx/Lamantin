<?php
namespace Lamantin\App\http\models;

use Lamantin\App\http\models\tables\Users;

class home
{
    public function auth(): bool
    {
        return isset($_COOKIE['t']) === true ? true : false;
    }

    public function get($token)
    {
        return Users::where('token', $token)->get()->toArray();
    }
}