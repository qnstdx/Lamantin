<?php
/**
* |-------------------------------------|
* |           GrappyFramework           |
* |                                     |
* |  https://github.com/Phpesher/Grappy |
* |              v0.8.3                 |
 *|        Last update: 15.02.20        |
* |-------------------------------------|
*/

use Grappy\App\Components\Router;

define ( 'ROOT', str_replace ( '\\', '/', __DIR__ ) );

require_once ( ROOT . '/vendor/autoload.php' );
require_once ( ROOT . '/config/bootstrap.php' );

// Load env configuration file
$dotenv = Dotenv\Dotenv::createImmutable( ROOT );
$dotenv->load();

if ( getenv('APP_DEBUG' ) === true )
{
	ini_set ( 'display_errors', 1 );
	error_reporting ( E_ALL );
}

$app = new Router();
$app->run();
