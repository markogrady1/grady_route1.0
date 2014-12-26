<?php namespace controllers;

use coreLib\Factory;

class Controller
{
    protected $db;
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
        echo "call from the controller", "<br><br>";
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
//        $this->model = 'models\\' . $model;
        $class = 'models\\' . $class;

        $newModel = $this->factory->getMVCInstance($class);
        echo "get instance for model", "<br><br>";
        return $newModel;

    }
}