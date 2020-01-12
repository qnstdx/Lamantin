<?php
namespace application\core; 

use mysql_xdevapi\Exception;

class Model
{
	public static function openAndWriteFileLogs ( $what_writing )
	{
		$fp = fopen ( ROOT . '/application/config/logs/engine_logs.txt', 'a+' );
		$fwr = date ( "Y-m-d H:i:s" ) . "\n$what_writing\n";
		$if_writed = fwrite ( $fp, $fwr );

		if ( $if_writed )
		{
			fclose($fp);
			return true;
		} else {
			throw new Exception("Error writing into file", 1);			
		}
	}
	/**
	 * Если не был найден uri запишем в лог файл
	 * ( Можно выводить информацию в админ панели )
	*/
	public static function openAndWriteFailRequestsUriLogs ( $uri )
	{		
		$ip = $_SERVER['REMOTE_ADDR'];

		$fp = fopen ( ROOT . '/application/config/logs/engine_requests_uri.txt', 'a+' );
		$fwr = "\ndate: " . date ( "Y-m-d H:i:s" ) . "\n$uri\n$ip\n";
		$if_writed = fwrite ( $fp, $fwr );

		if ( $if_writed )
		{
			fclose($fp);
			return true;
		} else {
			throw new Exception("Error writing into file logs", 1);			
		}

	}
}