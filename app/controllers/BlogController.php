<?php namespace controllers;


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
            echo "connected for blog controller";
            $this->data = $this->model->getAllPosts();

            var_dump($this->data);
        }
    }
} 