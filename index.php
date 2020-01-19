<?php
/**
* |-------------------------------------|
* |           GrappyFramework           |
* |                                     |
* |  https://github.com/Phpesher/Grappy |
* |              v0.2.3                 |
 *|        Last update: 18.01.20.       |
* |-------------------------------------|
*/
use application\components\Router;

define ( 'ROOT', str_replace ( '\\', '/', dirname ( __FILE__ ) ) );

require_once ( ROOT . '/vendor/autoload.php' );

spl_autoload_register ( function ( $class ) {
    $path = ROOT . '/' . str_replace ( '\\', '/', $class ) . '.php';

    if ( file_exists ( $path ) )
    {
        require $path;
    }
} );

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ( getenv('APP_DEBUG' ) == true )
{
	ini_set ( 'display_errors', 1 );
	error_reporting ( E_ALL );
}

$router = new Router();
$router->run();