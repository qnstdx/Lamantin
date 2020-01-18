<?php
namespace application\core;

use Exception;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig_Autoloader;
use Twig_Environment;
use Twig_Loader_Filesystem;

class View
{
    public static final function returnError( $error_code )
    {
        $require_path = ROOT . '/public/temp/errors/' . $error_code . '.html';

        if ( ! file_exists( $require_path ) )
        {
            Model::openAndWriteFileLogs("\nFile with error code: $error_code, not found on this server! \n path: $require_path\n");
            return false;
        } else {
            require_once ( $require_path );
            return true;
        } 
    }

    public static function requireTemp ( $temp_name, $params = [], $cache = false )
    {
        if ( ! file_exists ( ROOT . '/public/temp/' . $temp_name . '.html' ) )
        {
            //Пишем в лог файл
           Model::openAndWriteFileLogs("File (template) with name: $temp_name, not found on this server!");
            return false;          
        } else {
            Twig_Autoloader::register();

            $twig = new Twig_Loader_Filesystem(ROOT . '/public/temp' );
            if ( $cache == true )
            {
                if ( DEBUG === true )
                {
                    $t = new Twig_Environment( $twig, array(
                        'cache' => ROOT . '/public/cache',
                        'debug' => true
                    ) );
                } else {
                    $t = new Twig_Environment( $twig, array(
                        'cache' => ROOT . '/public/cache'
                    ) );
                }
            } else {
                if ( DEBUG == true )
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