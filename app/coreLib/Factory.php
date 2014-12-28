<?php namespace coreLib;

use controllers\Controller;
use models\HomeModel;
use models\Blog;
use models\About;

class Factory
{

    /**
     * Return an instance of a given class.
     *
     * @param array $class
     * @param array $model
     * @return mixed controllers\Controller | coreLib\Base
     */
    public function getInstance($class, $model = null)
    {

        $instance = ($model == null) ? new $class($this) : new $class($this, $model);

        return $instance;
    }
}