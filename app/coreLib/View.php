<?php namespace coreLib;

use contracts\Rendable;
use compile\Compile;
class View implements Rendable{

    public static function render($view, array $data)
    {
        if($view != '../app/views/layouts/footer.php'){

            self::compile($view, $data);

        }else{

            require_once( '../views/layouts/' . $view . '.php');
        }

    }

    /**
     * Compile view for templating
     *
     * @param  string $view
     * @param  array $data
     * @return void
     */
    public static function compile($view, $data = []) {

        $compile = new Compile($view);

        $compile->compile($data);

    }
}