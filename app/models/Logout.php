<?php

namespace Lamantin\App\models;

use Lamantin\App\core\model;
use Lamantin\App\models\tables\Users;

/**
 * Class Logout
 * @package Lamantin\App\models
 * @author Jolydev <superduperproger@gmail.com>
 */
class Logout extends model
{
    /**
     * @param string $token
     * @return void
     */
    public function update(string $token): void
    {
        $tok = Users::where('token', '=', $token)->first();
        $tok->token = '';
        $tok->save();
    }
}