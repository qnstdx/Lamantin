<?php
/**
* |-------------------------------------|
* |           GrappyFramework           |
* |                                     |
* |  https://github.com/Phpesher/Grappy |
* |              v0.6.1                 |
 *|        Last update: 26.01.20.       |
* |-------------------------------------|
*/
define ( 'ROOT', str_replace ( '\\', '/', dirname ( __FILE__ ) ) );

require_once ( ROOT . '/vendor/autoload.php' );

use application\components\Router;

$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
$dotenv->load();

if ( getenv('APP_DEBUG' ) == true )
{
	ini_set ( 'display_errors', 1 );
	error_reporting ( E_ALL );
}

$app = new Router();
$app->run();