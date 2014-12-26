<?php namespace coreLib;

use controllers\Controller;
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
    public function getMVCInstance($class, $model = null)
    {

        $instance = ($model == null) ? new $class($this) : new $class($this, $model);
        print_r($instance);echo "<br><br>";
        return $instance;
    }
}