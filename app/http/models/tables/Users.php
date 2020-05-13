<?php

namespace Lamantin\App\http\models\tables;

use Illuminate\Database\Eloquent\Model;
use Lamantin\App\core\bootstrap;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['username', 'token', 'email', 'password'];

    public function __construct(array $attributes = [])
    {
        (new bootstrap())->database();
        parent::__construct($attributes);
    }
}