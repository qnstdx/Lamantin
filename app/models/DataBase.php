<?php

namespace Lamantin\App\models;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class DataBase
 * @package Lamantin\App\models
 * @author qnstdx
 */
class DataBase
{
    /**
     * @var null
     */
    private static $instance = null;

    /**
     * DataBase constructor.
     */
    private function __construct()
    {
    }

    /**
     *
     */
    private function __clone()
    {
    }

    /**
     * @return void
     */
    public static function getInstance(): void
    {
        if (is_null(self::$instance)) {
            self::boot();
        }
    }

    /**
     * @return void
     */
    private static function boot(): void
    {
        $capsule = new Capsule();

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
