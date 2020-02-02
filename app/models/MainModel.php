<?php
namespace Grappy\App\Models;

use Grappy\App\Core\Model;
use Grappy\App\Components\db;

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
