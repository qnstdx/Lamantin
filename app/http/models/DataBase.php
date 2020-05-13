<?php
namespace Lamantin\App\http\models;

use Illuminate\Database\Capsule\Manager as Capsule;

class DataBase
{

    function __construct()
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver' => getenv('DB_DRIVER'),
            'host' => getenv('DB_HOST'),
            'database' => getenv('DB_DATABASE'),
            'username' => getenv('DB_LOGIN'),
            'password' => getenv('DB_PASSWORD'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        $capsule->bootEloquent();
    }
}