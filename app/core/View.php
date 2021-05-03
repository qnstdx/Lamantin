<?php

namespace Lamantin\App\core;

use Exception;
use Lamantin\App\components\Csrf;
use Lamantin\App\components\Vroot;
use Lamantin\App\models\Home;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

/**
 * Class View
 * @package Lamantin\App\core
 * @author qnstdx
 */
class View
{
    /**
     * @param string $name
     * @return void
     */
    public static function error(string $name): void
    {
        require_once ROOT . "/public/public/temps/$name.html.twig";
    }

    /**
     * @param string $name
     * @param array $params
     * @throws Exception
     * @return void
     */
    public static function render(string $name, array $params = []): void
    {
        if (!file_exists(getenv('APP_VIEWS_PATH') . $name . '.html.twig')) {
            throw new Exception("View $name not found! path: " . getenv('APP_VIEWS_PATH') . $name . '.html.twig');
        } else {
            /** @phpstan-ignore-next-line */
            $loader = new FilesystemLoader(getenv('APP_VIEWS_PATH'));
            if (getenv('APP_CACHE') === 'true') {
                $twig = new Environment($loader, [
                    'cache' => getenv('APP_TWIG_CACHE_P'),
                ]);
            } else {
                $twig = new Environment($loader);
            }

            (new View())->addTwigFunctions($twig);

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

    /**
     * @param Environment $twig
     * @return void
     */
    private function addTwigFunctions(Environment $twig): void
    {
        $csrf = new \Twig\TwigFunction('csrf', function () {
            return (new Csrf())->get();
        });
        $auth = new \Twig\TwigFunction('auth', function () {
            return isAuth();
        });
        $root = new \Twig\TwigFunction('root', function () {
            return (new Vroot())->get();
        });

        $twig->addFunction($csrf);
        $twig->addFunction($auth);
        $twig->addFunction($root);
    }
}
