<?php namespace controllers;

use coreLib\View;

class AboutController extends Controller
{
    /**
     * Values returned from the model
     * 
     * @var array $data
     */
    private $data;

    /**
     * initial method for the AboutController
     * 
     * @return boolean
     */
    public function index()
    {

        $this->model = $this->acquireModel('About');

        $this->db = $this->model->getConnection();

        if ($this->db) {

            $this->data = $this->model->getAboutDetails();

            View::render('../app/views/content/aboutView.php','About',  $this->data);

        } else {
            return false;
        }
    }
}
