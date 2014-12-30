<?php namespace views;

use contracts\Rendable;

class Blog implements Rendable{
    public $view;
    public $data;
    public function __construct($view, $data) {
        echo "<h1>i am certainly hewe</h1>";
        $this->view = $view;
        $this->data = $data;
    }

    public function render(){
        echo "blog view";
        require $this->view;
    }
}