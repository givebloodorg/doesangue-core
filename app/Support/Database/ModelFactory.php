<?php

namespace GiveBlood\Support\Database;

use Illuminate\Database\Eloquent\Factory;
use Faker\Generator;
/**
 * Class ModelFactory
 */
abstract class ModelFactory
{
    /**
     * @var string
     */
    protected $model;

    /**
     * @var Factory
     */
    protected $factory;

    /**
     * @var Generator
     */
    protected $faker;

    /**
     * ModelFactory construct
     */
    public function __construct()
    {
        $this->factory = app()->make(Factory::class);
        $this->faker = app()->make(Generator::class);
    }

    /**
     *
     */
    public function define()
    {
        $this->factory->define(
            $this->model, fn() => $this->fields()
        );
    }

    /**
     * @return mixed[]
     */
    abstract protected function fields(): array;
}
