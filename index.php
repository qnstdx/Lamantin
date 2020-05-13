<?php

use Lamantin\App\core\bootstrap;

define('ROOT', str_replace('\\', '/', __DIR__));

require_once(ROOT . '/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();

if (getenv('APP_DEBUG') === 'true') {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

$app = new bootstrap();
$app->init();