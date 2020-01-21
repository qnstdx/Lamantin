<?php
/**
* |-------------------------------------|
* |           GrappyFramework           |
* |                                     |
* |  https://github.com/Phpesher/Grappy |
* |              v0.4.0                 |
 *|        Last update: 20.01.20.       |
* |-------------------------------------|
*/
use application\components\Router;

define ( 'ROOT', str_replace ( '\\', '/', dirname ( __FILE__ ) ) );

require_once ( ROOT . '/vendor/autoload.php' );

$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
$dotenv->load();

if ( getenv('APP_DEBUG' ) == true )
{
	ini_set ( 'display_errors', 1 );
	error_reporting ( E_ALL );
}

$app = new Router();
$app->run();