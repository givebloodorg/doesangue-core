<?php

namespace GiveBlood\Support\Http\Routing;

/**
 * Route clas
 */
abstract class Router
{
    /**
     * @var array
     */
    protected $options;

    /**
     * @var Illuminate\Routing\Router
     */
    protected $router;

    /**
     * Router constructor
     */
    public function __construct($options = [])
    {
        $this->options = $options;

        $this->router = app('router');
    }

    /**
     * Register method
     */
    public function register()
    {
        $this->router->group(
            $this->options, function () {
                $this->routes();
            }
        );
    }

    /**
     * @return mixed
     */
    abstract protected function routes();
}
