<?php

namespace Lamantin\App\models\tables;

use Illuminate\Database\Eloquent\Model;
use Lamantin\App\models\DataBase;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['username', 'token', 'email', 'password'];

    public function __construct(array $attributes = [])
    {
        DataBase::getInstance();
        parent::__construct($attributes);
    }
}