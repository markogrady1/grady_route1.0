<?php namespace views;

use contracts\Rendable;

class HomeMain implements Rendable
{
   /**
    * Path for the home page
    * 
    * @var string $view
    */
    public $view;
    
   /**
    * Data retrieved from the database concerning the home page
    * 
    * @var array $data
    */    
    public $data;

    public function __construct($view, $data)
    {
        $this->view = $view;
        $this->data = $data;
    }

    /**
    * Require a given view
    * 
    * @return void
    */
    public function render()
    {
        require $this->view;
    }
}
