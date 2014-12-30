<?php namespace views;

use contracts\Rendable;

class Blog implements Rendable
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