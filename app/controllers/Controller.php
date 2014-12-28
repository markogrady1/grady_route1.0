<?php namespace controllers;

use coreLib\Factory;

class Controller
{
    /**
     * Instance of the database
     * 
     * @var object $db
     */
    protected $db;

    /**
     * Instance of the Factory class
     * 
     * @var Factory $factory
     */
    private $factory;

    /**
     * The instance of the model.
     *
     * @var object coreLib\Base $model
     */
    public $model = "";


    public function __construct(Factory $factory)
    {
        $this->model = "";

        $this->factory = $factory;
    }

    /**
     * Acquires model of a given value.
     *
     * @param  string $model
     * @return object coreLib/Base
     */
    public function acquireModel($class)
    {

        $class = 'models\\' . $class;

        $newModel = $this->factory->getInstance($class);

        return $newModel;

    }
}
