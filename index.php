<?php

declare(strict_types=1);

define('ROOT', str_replace('\\', '/', __DIR__));

require_once(ROOT . '/vendor/autoload.php');
require_once(ROOT . '/app/helpers/helpers.php');

use Lamantin\App\core\bootstrap;

$dotenv = Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();

if (getenv('APP_DEBUG') === 'true') {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
}

session_start();
(new bootstrap())->init();
