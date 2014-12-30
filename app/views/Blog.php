<?php namespace views;

use contracts\Rendable;

class Blog implements Rendable
{
   /**
    * Path for the blog page
    * 
    * @var string $view
    */
    public $view;
    
   /**
    * Data retrieved from the database concerning the blog page
    * 
    * @var array $data
    */
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
