<?php
/**
* |-------------------------------------|
* |           GrappyFramework           |
* |                                     |
* |  https://github.com/Phpesher/Grappy |
* |              v0.8.0                 |
 *|        Last update: 12.02.20        |
* |-------------------------------------|
*/
define ( 'ROOT', str_replace ( '\\', '/', dirname ( __FILE__ ) ) );

require_once ( ROOT . '/vendor/autoload.php' );

use Grappy\App\Components\Router;

$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
$dotenv->load();

if ( getenv('APP_DEBUG' ) == true )
{
	ini_set ( 'display_errors', 1 );
	error_reporting ( E_ALL );
}

$app = new Router();
$app->run();