<?php
namespace application\components;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class GrappyLogger
{
    /**
     * @param $handler_name
     * @param string $what_write
     * @param array $params
     */
    public static function debugLogger ( $handler_name, $what_write = '', $params = [] )
    {
        $log = new Logger( $handler_name );
        $log->pushHandler( new StreamHandler( ROOT . getenv( 'APP_DEBUG_LOGS_P' ), Logger::DEBUG ) );

        return $log->debug( $what_write, $params );
    }

    /**
     * @param $handler_name
     * @param string $what_write
     * @param array $params
     */
    public static function infoLogger ( $handler_name, $what_write = '', $params = [] )
    {
        $log = new Logger( $handler_name);
        $log->pushHandler( new StreamHandler( ROOT . getenv( 'APP_INFO_LOGS_P' ), Logger::INFO ) );

        return $log->info( $what_write, $params );
    }
}