<?php
namespace Grappy\App\Core;

use Grappy\App\Components\GrappyLogger;
use Exception;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig_Autoloader;
use Twig_Environment;
use Twig_Loader_Filesystem;

class View
{
    /**
     * Подключает страницу с ошибкой
     * @param $error_code
     * @return bool
     */
    public static final function returnErrorPage( $error_code )
    {
        $require_path = ROOT . '/public/temp/errors/' . $error_code . '.html';

        if ( ! file_exists( $require_path ) )
        {
            GrappyLogger::debugLogger('TEMP_ERROR', "Template with $error_code not found!", [
                'URL' => $_SERVER['REQUEST_URI']
            ]);
            return false;
        } else {
            require_once ( $require_path );
            return true;
        } 
    }

    /**
     * Подключает нужный шаблон
     * @param $temp_name
     * @param array $params
     * @param bool $cache
     * @return bool
     * @throws Exception
     */
    public static function renderTemp ( $temp_name, $params = [], $cache = false )
    {
        if ( ! file_exists ( ROOT . getenv( 'APP_TEMPS_P' ) . $temp_name . '.html' ) )
        {
            //Пишем в лог файл
            GrappyLogger::debugLogger('TEMP_ERROR', "Template with name $temp_name not found!", [
                'URL' => $_SERVER['REQUEST_URI']
            ]);
            return false;          
        } else {
            Twig_Autoloader::register();

            $twig = new Twig_Loader_Filesystem(ROOT . getenv( 'APP_TEMPS_P' ) );
            if ( $cache == true )
            {
                if ( getenv( 'APP_DEBUG' ) === true )
                {
                    $t = new Twig_Environment( $twig, array(
                        'cache' => ROOT . getenv( 'APP_TWIG_CACHE_P' ),
                        'debug' => true
                    ) );
                } else {
                    $t = new Twig_Environment( $twig, array(
                        'cache' => ROOT . getenv( 'APP_TWIG_CACHE_P' )
                    ) );
                }
            } else {
                if ( getenv( 'APP_DEBUG' ) == true )
                {
                    $t = new Twig_Environment( $twig, array(
                        'debug' => true
                    ) );
                } else {
                    $t = new Twig_Environment( $twig );
                }
            }

            try {
                echo $t->render($temp_name . '.html', $params );
            } catch ( LoaderError $e ) {
                throw new Exception( 'LoaderError! ' . $e->getMessage(), 1 );
            } catch ( RuntimeError $e ) {
                throw new Exception( 'RuntimeError! ' . $e->getMessage(), 1 );
            } catch ( SyntaxError $e ) {
                throw new Exception( 'SyntaxError! ' . $e->getMessage(), 1 );
            }

            return true;
        }     
    }

    public static function redirect ( $where_redirect )
    {
        header("Location: $where_redirect");
        return true;
    }
} 