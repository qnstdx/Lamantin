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

/**
 * Class Bootstrap
 * @package Lamantin\App\core
 * @author Jolydev <superduperproger@gmail.com>
 */
class Bootstrap
{
    /**
     * @var RouteCollector
     */
    private $router;

    /**
     * Bootstrap constructor.
     */
    public function __construct()
    {
        $this->router = new RouteCollector();
    }

    /**
     * @return void
     */
    public function init(): void
    {
        $this->routes();
        $this->dispatch();
    }

    /**
     * @return void
     */
    private function routes(): void
    {
        $this->router->get('/', function () {
            return (new Main())->mainPage();
        });
        $this->router->get('/login', function () {
            return (new Login())->loginPage();
        });
        $this->router->get('/register', function() {
            return (new Register())->registerPage();
        });

        $this->router->post('/Login', function() {
            return (new Login())->loginPost();
        });
        $this->router->post('/Register', function() {
            return (new Register())->registerPost(
                $_POST['name'],
                $_POST['email'],
                $_POST['password'],
                $_POST['CSRF-TOKEN']
            );
        });

        $this->router->any('/home', function() {
            return (new Home())->homePage();
        });
        $this->router->any('/logout', function() {
            return (new Logout())->logout();
        });
    }

    /**
     * @return void
     */
    private function dispatch(): void
    {
        $dispatcher = new Dispatcher($this->router->getData());

        try {
            $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        } catch (HttpRouteNotFoundException $e) {
            View::error('404');
        } catch (HttpMethodNotAllowedException $e) {
            exit('This method not allowed here!');
        }

        if (isset($response)) {
            echo $response;
        }
    }
}
