<?php namespace views;

use contracts\Rendable;

class About implements Rendable{
    public $view;
    public $data;
    public function __construct($view, $data) {
        echo "<h1>i am certainly hewe at about</h1>";
        $this->view = $view;
        $this->data = $data;
    }

    public function render(){
        echo "About view";
          require $this->view;
    }
}