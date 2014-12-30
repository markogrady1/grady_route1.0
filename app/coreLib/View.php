<?php namespace coreLib;

use views;

class View
{

    private static $factory;

    public static function render(array $viewDetails, Factory $factory)
    {
        $arrayDetails = array_values($viewDetails);

        list($path, $class, $data) =  $arrayDetails;
        
        self::$factory = $factory;

        if ($path != '../app/views/layouts/footer.php') {

            self::resolveView($path, $class, $data);

        } else {

            require_once('../views/layouts/' . $path . '.php');
        }

    }

    public static function resolveView($view, $class, $data = [])
    {

        if (is_file($view)) {

            $actualView = "views\\$class";

            $view = self::$factory->getViewInstance($view, $actualView, $data);

            $view->render();

        } else {

            return false;
        }
    }
}