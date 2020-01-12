<?php
namespace application\models;

use application\core\Model;
use application\components\Db;

class MainModel extends Model
{
    public static function WorkWithDb ()
    {  	
    	$db = new DB;

    	$data = $db->column( "SELECT * FROM grappy.foo WHERE id = :id", ['id' => 1] );
	}
}