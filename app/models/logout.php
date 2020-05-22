<?php

namespace Lamantin\App\models;

use Lamantin\App\core\model;
use Lamantin\App\models\tables\Users;

class logout extends model
{
    public function update(string $token): void
    {
        $tok = Users::where('token', '=', $token)->first();
        $tok->token = '';
        $tok->save();
    }
}