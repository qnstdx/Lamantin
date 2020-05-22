<?php
namespace Lamantin\App\models;

use Illuminate\Database\Capsule\Manager as Capsule;

class DataBase
{
    private static $instance = null;

    private function __construct() {}

    private function __clone() {}

    private function __sleep() {}

    private function __wakeup() {}

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
           self::boot();
        }

        return self::$instance;
    }

    private static function boot()
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