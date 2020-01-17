<?php
namespace application\components;

use application\core\Model;
use application\core\View;

class Router
{
	/*
	 * Храним тут роуты
	 * @var array
	**/
	private $routes;

	public function __construct ()
	{
		// Подключаем файл с роутами
		$routes_path = ROOT . '/application/config/routes.php';
		// И записываем подключая
		$this->routes = require ( $routes_path );
	}
	/**
	 * Return request string
	 * @return string
	*/
	private function getURI ()
	{
		if ( ! empty ( $_SERVER['REQUEST_URI'] ) ) 
		{
			return trim ( $_SERVER['REQUEST_URI'], '/' );
		}
	}

	public function run ()
	{
		$uri = $this->getURI();

		foreach ( $this->routes as $uri_pattern => $path )
		{
			// Сравниваем строку запроса ($uri) и данные в роутах ($uri_pattern)

            // Переменная для проверки на существования роута
            $if_found = 0;
			if ( preg_match ( "~$uri_pattern~", $uri ) )
			{
                $if_found++;
				// Внутренний адрес с параметрами и обработаем их далее
				$internal_route = preg_replace ( "~$uri_pattern~", $path, $uri );
				
				// Определяем экшен и контроллер которые это обработают
				$segments = explode ( '/', $internal_route );
				//print_r($segments);
				
				/**
				 * [0] => controller
				 * [1] => action
				*/

				$controller_name = array_shift ( $segments ) . 'Controller';
				$controller_name = ucfirst ( $controller_name );

				$action_name = 'action' . ucfirst ( array_shift ( $segments ) );
				// Метод = action$segment;

				$parameters = $segments;

				$controller_file = ROOT . '/application/controllers/' . $controller_name . '.php';

				if ( file_exists ( $controller_file ) )
				{
					require_once ( $controller_file );
				}

				$controller_obj = new $controller_name;

				// Вызываем нужный метод и передаём нужные параметры				
				$result = call_user_func_array ( array( $controller_obj, $action_name ), $parameters );
				if ( $result != null )
				{
					break;
				}
			}
		}
        if ( $if_found != 1 )
        {
            if ( $uri == '' )
            {
                View::redirect( '/main' );
            } else
            {
                View::returnError( '404' );
            }
        }
	}
}