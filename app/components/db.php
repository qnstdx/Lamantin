<?php
namespace Grappy\app\components;

use Exception;
use \RedBeanPHP\R;

class db
{
    /**
     * @var Object
     */
    private $db;

    /**
     * @param string $host
     * @param string $db_name
     * @param string $user_name
     * @param string $password
     * @return mixed
     * @throws Exception
     */
    public function __construct ( $host, $db_name, $user_name, $password )
    {
        $db = R::setup( 'mysql:host=' . $host . ';db_name=' . $db_name . '', $user_name, $password );

        if ( ! R::testConnection() )
        {
            throw new Exception( "Error connecting with you DataBase", 1 );
        } else {
            $this->db = $db;
            return true;
        }
    }
    /**
     * @param $sql
     * @param array $params
     * @return int
     */
    public function query ( $sql, $params = [] )
    {
        $some_data = R::exec( $sql, $params );
        return $some_data;
    }
}