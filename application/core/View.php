<?php
namespace application\core;

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

    public static function requireTemp ( $temp_name )
    {
        if ( ! file_exists ( ROOT . '/public/temp/' . $temp_name . '.html' ) )
        {
            //Пишем в лог файл
           Model::openAndWriteFileLogs("File (template) with name: $temp_name, not found on this server!");
            return false;          
        } else {
            require_once ( ROOT . '/public/temp/' . $temp_name . '.html');
            return true;
        }     
    }

    public static function redirect ( $where_redirect )
    {
        header("Location: $where_redirect");
        return true;
    }
} 