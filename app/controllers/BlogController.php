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

            $viewDetails = array(
                $viewDetails[0] = '../app/views/content/blogView.php',
                $viewDetails[1] = 'Blog',
                $viewDetails[2] = $this->data
            );

            View::render($viewDetails, $this->factory);

        } else {

            return false;
        }

    }
} 