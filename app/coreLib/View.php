<?php namespace coreLib;

use views;

class View {

    public static function render($view, $class, array $data)
    {
        if($view != '../app/views/layouts/footer.php'){

            self::resolveView($view, $class, $data);

        }else{

            require_once( '../views/layouts/' . $view . '.php');
        }

    }

    public static function resolveView($view, $class, $data = []) {

        if(is_file($view)) {

            $actualView = "views\\$class";

            $view = new $actualView($view, $data);

            $view->render();

        }else{

           return false;
        }
    }
}