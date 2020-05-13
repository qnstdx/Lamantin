<?php

namespace Lamantin\App\core;

use Lamantin\App\http\controllers\home;
use Lamantin\App\http\controllers\login;
use Lamantin\App\http\controllers\logout;
use Lamantin\App\http\controllers\main;
use Lamantin\App\http\controllers\register;
use Lamantin\App\http\models\DataBase;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;

class bootstrap
{
    private $router;

    // Controllers exemplars
    private $main;
    private $login;
    private $register;
    private $home;
    private $logout;

    public function __construct()
    {
        $this->router = new RouteCollector();

        $this->main = new main();
        $this->login = new login();
        $this->register = new register();
        $this->home = new home();
        $this->logout = new logout();
    }

    public function init()
    {
        $this->routes();
        $this->dispatch();
    }

    private function routes(): void
    {
        $this->router->get('/', function () {
            return $this->main->mainPage();
        });
        $this->router->get('/login', function () {
            return $this->login->loginPage();
        });
        $this->router->get('/register', function() {
            return $this->register->registerPage();
        });

        $this->router->post('/Login', function() {
            return $this->login->loginPost();
        });
        $this->router->post('/Register', function() {
            return $this->register->registerPost();
        });

        $this->router->any('/home', function() {
            return $this->home->homePage();
        });
        $this->router->any('/logout', function() {
            return $this->logout->logout();
        });
    }

    private function dispatch(): void
    {
        $dispatcher = new Dispatcher($this->router->getData());

        try {
            $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        } catch (HttpRouteNotFoundException $e) {
            view::error('404');
        } catch (HttpMethodNotAllowedException $e) {
            exit('This method not allowed here!');
        }

        if (isset($response)) {
            echo $response;
        }
    }

    public function database()
    {
        return new DataBase();
    }
}