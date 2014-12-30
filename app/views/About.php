<?php namespace views;

use contracts\Rendable;

class About implements Rendable
{
    /**
     * Path for the about page
     * 
     * @var string $data
     */
    public $view;
    
    /**
     * Data retrieved from the database concerning the about page
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
