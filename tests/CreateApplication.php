<?php

namespace Lamantin\Tests;

use Dotenv\Dotenv;

trait CreateApplication
{
    public function create()
    {
        define('ROOT', str_replace('\\', '/', __DIR__ . '/../'));

        require_once(ROOT . '/vendor/autoload.php');

        $dotenv = Dotenv::createImmutable(ROOT);
        $dotenv->load();
    }
}