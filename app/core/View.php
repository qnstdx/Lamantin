<?php

namespace Lamantin\App\core;

use Exception;
use Lamantin\App\components\csrf;
use Lamantin\App\http\models\home;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig_Autoloader;
use Twig_Environment;
use Twig_Loader_Filesystem;

class view
{
    public static function error($name): void
    {
        require_once(ROOT . '/public/temps/' . $name . '.html.twig');
    }

    public static function render($name, $params = []): void
    {
        if (!file_exists(ROOT . getenv('APP_VIEWS_PATH') . $name . '.html.twig')) {
            throw new Exception("View $name not found! path: " . ROOT . getenv('APP_VIEWS_PATH') . $name . '.html.twig');
        } else {
            Twig_Autoloader::register();

            $twig = new Twig_Loader_Filesystem(ROOT . getenv('APP_VIEWS_PATH'));

            if (!file_exists(ROOT . getenv('APP_TWIG_CACHE_P'))) {
                mkdir(ROOT . getenv('APP_TWIG_CACHE_P'));
            }

            if (getenv('APP_DEBUG') === 'true') {
                $t = new Twig_Environment($twig, array(
                    'cache' => ROOT . getenv('APP_TWIG_CACHE_P'),
                    'debug' => true
                ));
            } else {
                $t = new Twig_Environment($twig, array(
                    'cache' => ROOT . getenv('APP_TWIG_CACHE_P')
                ));
            }

            (new view())->addTwigFunctions($t);

            try {
                echo $t->render($name . '.html.twig', $params);
            } catch (LoaderError $e) {
                throw new Exception('LoaderError! ' . $e->getMessage());
            } catch (RuntimeError $e) {
                throw new Exception('RuntimeError! ' . $e->getMessage());
            } catch (SyntaxError $e) {
                throw new Exception('SyntaxError! ' . $e->getMessage());
            }
        }
    }

    private function addTwigFunctions(Twig_Environment $t): void
    {
        $function = new \Twig\TwigFunction('csrf', function () {
            return (new csrf())->get();
        });

        $t->addFunction($function);

        $function = new \Twig\TwigFunction('auth', function () {
            return (new home())->auth();
        });

        $t->addFunction($function);
    }
}