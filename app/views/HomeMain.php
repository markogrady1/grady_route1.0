<?php namespace views;

use contracts\Rendable;

class HomeMain implements Rendable
{
    public $view;
    public $data;

    public function __construct($view, $data)
    {
        $this->view = $view;
        $this->data = $data;
    }

    public function render()
    {
        require $this->view;
    }
}