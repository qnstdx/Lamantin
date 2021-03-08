<?php

namespace Lamantin\App\core;

use Lamantin\App\http\controllers\Home;
use Lamantin\App\http\controllers\Login;
use Lamantin\App\http\controllers\Logout;
use Lamantin\App\http\controllers\Main;
use Lamantin\App\http\controllers\Register;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;

/**
 * Class Bootstrap
 * @package Lamantin\App\core
 * @author qnstdx
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
            (new Main())->mainPage();
        });
        $this->router->get('/login', function () {
            (new Login())->loginPage();
        });
        $this->router->get('/register', function () {
            (new Register())->registerPage();
        });

        $this->router->post('/Login', function () {
            (new Login())->loginPost(
                $_POST['email'],
                $_POST['password']
            );
        });
        $this->router->post('/Register', function () {
            (new Register())->registerPost(
                $_POST['name'],
                $_POST['email'],
                (string) $_POST['password'],
                $_POST['CSRF-TOKEN']
            );
        });

        $this->router->any('/home', function () {
            (new Home())->homePage();
        });
        $this->router->any('/logout', function () {
            (new Logout())->logout();
        });
    }

    /**
     * @return void
     */
    private function dispatch(): void
    {
        $dispatcher = new Dispatcher($this->router->getData());

        try {
            $response = $dispatcher->dispatch(
                $_SERVER['REQUEST_METHOD'],
                parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
            );
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
