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

    public function index()
    {
        $this->model = $this->acquireModel('Blog');

        $this->db = $this->model->getConnection();
        if ($this->db) {

            $this->data = $this->model->getAllPosts();
            View::render('../app/views/home.php',  $this->data);
           // var_dump($this->data);// for development purposes
        }
    }
} 