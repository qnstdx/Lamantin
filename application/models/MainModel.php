<?php
namespace application\models;

use application\core\Model;
use application\components\db;

class MainModel extends Model
{
    public static function WorkWithDb ()
    {
        try {
            //$db = new db ( getenv('DB_HOST'), getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD') );
            //return $db;
        } catch (\Exception $e) {
            throw new \Exception ( 'Error connect with DataBase' . $e->getMessage(), 1 );
        }
        /**
         * Для начала работы создайте базу и импортируйте файл sql dump, пропишите свои настройки в файле .env
         *
         * Примеры:
         *
         * 1) $db->query ("SELECT * FROM grappy.foo WHERE id = ?", [1]);
         * 2)
        */
    }
}
