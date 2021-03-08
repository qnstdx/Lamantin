<?php

namespace Lamantin\App\components;

/**
 * Class Vroot (View root, for correct css).
 * @package Lamantin\App\components
 * @author qnstdx
 */

class Vroot
{
    /**
     * @var string
     */
    private $root;

    /**
     * Vroot constructor.
     */
    public function __construct()
    {
        $this->root = getenv("APP_VIEW_ROOT");
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->root;
    }
}