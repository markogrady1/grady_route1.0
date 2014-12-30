<?php namespace controllers;

use coreLib\View;

class BlogController extends Controller
{
    /**
     * Data from model
     *
     * @var array $data
     */
    private $data;
    
    /**
     * initial method for the AboutController
     * 
     * @return void | boolean
     */
    public function index()
    {
        $this->model = $this->acquireModel('Blog');

        $this->db = $this->model->getConnection();
        if ($this->db) {

            $this->data = $this->model->getAllPosts();

            $viewDetails = array(
                'path'  => '../app/views/content/blogView.php',
                'class' => 'Blog',
                'data'  => $this->data
            );

            View::render($viewDetails, $this->factory);

        } else {

            return false;
        }

    }
} 
