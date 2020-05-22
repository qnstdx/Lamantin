<?php

namespace Lamantin\App\core;

use Exception;
use Lamantin\App\components\csrf;
use Lamantin\App\models\home;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class view
{
    public static function error(string $name): void
    {
        require_once(ROOT . '/public/temps/' . $name . '.html.twig');
    }

    public static function render(string $name, array $params = []): void
    {
        if (!file_exists(ROOT . getenv('APP_VIEWS_PATH') . $name . '.html.twig')) {
            throw new Exception("View $name not found! path: " . ROOT . getenv('APP_VIEWS_PATH') . $name . '.html.twig');
        } else {
            $loader = new FilesystemLoader(ROOT . getenv('APP_VIEWS_PATH'));
            if (getenv('APP_CACHCE') === true) {
                $twig = new Environment($loader, [
                    'cache' => getenv('APP_TWIG_CACHE_P'),
                ]);
            } else {
                $twig = new Environment($loader);
            }

            (new view())->addTwigFunctions($twig);

            try {
                echo $twig->render($name . '.html.twig', $params);
            } catch (LoaderError $e) {
                throw new Exception('LoaderError! ' . $e->getMessage());
            } catch (RuntimeError $e) {
                throw new Exception('RuntimeError! ' . $e->getMessage());
            } catch (SyntaxError $e) {
                throw new Exception('SyntaxError! ' . $e->getMessage());
            }
        }
    }

    private function addTwigFunctions(Environment $t): void
    {
        $csrf = new \Twig\TwigFunction('csrf', function () {
            return (new csrf())->get();
        });
        $auth = new \Twig\TwigFunction('auth', function () {
            return (new home())->auth();
        });

        $t->addFunction($csrf);
        $t->addFunction($auth);
    }
}