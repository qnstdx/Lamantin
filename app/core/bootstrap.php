<?php

namespace Lamantin\App\core;

use Lamantin\App\http\controllers\home;
use Lamantin\App\http\controllers\login;
use Lamantin\App\http\controllers\logout;
use Lamantin\App\http\controllers\main;
use Lamantin\App\http\controllers\register;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;

class bootstrap
{
    private $router;

    // Controllers exemplars
    public function __construct()
    {
        $this->router = new RouteCollector();
    }

    public function init(): void
    {
        $this->routes();
        $this->dispatch();
    }

    private function routes(): void
    {
        $this->router->get('/', function () {
            return (new main())->mainPage();
        });
        $this->router->get('/login', function () {
            return (new login())->loginPage();
        });
        $this->router->get('/register', function() {
            return (new register())->registerPage();
        });

        $this->router->post('/Login', function() {
            return (new login())->loginPost();
        });
        $this->router->post('/Register', function() {
            return (new register())->registerPost();
        });

        $this->router->any('/home', function() {
            return (new home())->homePage();
        });
        $this->router->any('/logout', function() {
            return (new logout())->logout();
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
}