<?php

namespace Lamantin\App\models\tables;

use Illuminate\Database\Eloquent\Model;
use Lamantin\App\models\DataBase;

/**
 * Class Users
 * @package Lamantin\App\models\tables
 * @author Jolydev <superduperproger@gmail.com>
 */
class Users extends Model
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string[]
     */
    protected $fillable = ['username', 'token', 'email', 'password'];

    /**
     * Users constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        DataBase::getInstance();
        parent::__construct($attributes);
    }
}