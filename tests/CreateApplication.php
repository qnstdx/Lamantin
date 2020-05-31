<?php

namespace Lamantin\Tests;

use Dotenv\Dotenv;

/**
 * Trait CreateApplication
 * @package Lamantin\Tests
 * @author Jolydev <superduperproger@gmail.com>
 */
trait CreateApplication
{
    // Create default application requirements.
    /**
     * @return void
     */
    public function create(): void
    {
        define('ROOT', str_replace('\\', '/', __DIR__ . '/../'));

        require_once(ROOT . '/vendor/autoload.php');

        $dotenv = Dotenv::createImmutable(ROOT);
        $dotenv->load();
    }
}