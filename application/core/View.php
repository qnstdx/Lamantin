<?php
namespace application\core;

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

    public static function requireTemp ( $temp_name, $params = [] )
    {
        if ( ! file_exists ( ROOT . '/public/temp/' . $temp_name . '.html' ) )
        {
            //Пишем в лог файл
           Model::openAndWriteFileLogs("File (template) with name: $temp_name, not found on this server!");
            return false;          
        } else {
            Twig_Autoloader::register();

            $twig = new Twig_Loader_Filesystem(ROOT . '/public/temp' );
            $t = new Twig_Environment( $twig );

            echo $t->render( $temp_name . '.html', $params );

            return true;
        }     
    }

    public static function redirect ( $where_redirect )
    {
        header("Location: $where_redirect");
        return true;
    }
} 