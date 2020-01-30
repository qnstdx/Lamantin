<?php
namespace Grappy\app\models;

use Grappy\app\core\Model;
use Grappy\app\components\db;

class MainModel extends Model
{
    public $db;

    public function __construct( $host, $data_base, $user_name, $user_password )
    {
        $db = new db ( $host, $data_base, $user_name, $user_password );
        $this->db = $db;
        return $db;
    }
}
