<?php

namespace Lamantin\App\models;

use Lamantin\App\core\Model;
use Lamantin\App\models\tables\Users;

/**
 * Class Logout
 * @package Lamantin\App\models
 * @author qnstdx
 */
class Logout extends Model
{
    /**
     * @param string $token
     * @return void
     */
    public function update(string $token): void
    {
        /** @phpstan-ignore-next-line */
        $tok = Users::where('token', '=', $token)->first();
        $tok->token = '';
        $tok->save();
    }
}
