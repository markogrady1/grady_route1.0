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
            View::render('../app/views/blog.php',  $this->data);

        } else {
            return false;
        }
    }
} 
