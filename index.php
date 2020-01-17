<?php
use application\components\Router;

define ( 'ROOT', str_replace ( '\\', '/', dirname ( __FILE__ ) ) );

require_once ( ROOT . '/application/config/settings/engine_settings.php' );
require_once ( 'vendor/autoload.php' );

spl_autoload_register ( function ( $class ) {
	$path = ROOT . '/' . str_replace ( '\\', '/', $class ) . '.php';

	if ( file_exists ( $path ) )
	{
		require $path;
	}
} );

if ( DEBUG === true )
{
	ini_set ( 'display_errors', 1 );
	error_reporting ( E_ALL );
}

$router = new Router();
$router->run();