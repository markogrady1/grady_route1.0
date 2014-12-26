<?php namespace controllers;

class HomeController extends Controller
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

            $this->data = $this->model->getLastPost();

            var_dump($this->data);// for development purposes
        }

//        $posts = $this->model->getLatestPost($this->db);
//
//        $dateString = $this->getReadableDate($posts);
//
//        $posts->date = $dateString;
//
//        $logger = new VisitorLog;
//
//        $logger->logVisit();
//
//        View::render('../app/views/home.php', $posts);
    }
}
