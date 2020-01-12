<?php
namespace application\models;

use application\core\Model;
use application\components\Db;

class MainModel extends Model
{
    public static function WorkWithDb ()
    {  	
    	$db = new DB;
    	/**
    	 *Запрос к базе
    	*/
    	$data = $db->row( "SELECT * FROM foo WHERE id = :id", ['id' => 1] );
	}
}