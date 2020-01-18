<?php
namespace application\components;

use Exception;
use PDO;
use PDOException;

class DB
{
	protected $db;

	function __construct()
	{
		try {
			$this->db = new PDO ( 'mysql:dbname=' . DB_NAME . ';host=' . HOST . '', USER_NAME, USER_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] );
			return true;
		} catch ( PDOException $e ) {
			throw new Exception( "Error Connect with db" . $e->getMessage(), 1 );
		}
	}

	public function query ( $sql, $params = [] )
	{
		$stmt = $this->db->prepare( $sql );

		if ( ! empty ( $params ) )
		{
			foreach ( $params as $key => $val ) 
			{
				$stmt->bindValue( ":$key", $val );
			}
		}
		$stmt->execute();

		return $stmt;
	}

	public function row ( $sql, $params = [] )
	{
		$result = $this->query( $sql, $params );
		return $result->fetchAll( PDO::FETCH_ASSOC );
	}

	public function column ( $sql, $params = [] )
	{
		$result = $this->query( $sql, $params );
		return $result->fetchColumn();
	}
}