<?php namespace views;

use contracts\Rendable;

class HomeMain implements Rendable{
    public $view;
    public $data;
    public function __construct($view, $data) {
        echo "<h1>i am certainly hewe at home</h1>";
        $this->view = $view;
        $this->data = $data;
    }

    public function render(){
        echo "Home view";
        require $this->view;
    }
}