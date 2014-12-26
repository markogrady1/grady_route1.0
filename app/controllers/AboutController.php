<?php namespace controllers;

class AboutController extends Controller{
    private $data;

    public function index()
    {

        $this->model = $this->acquireModel('About');
        $this->db = $this->model->getConnection();
        if($this->db) {
          $this->data = $this->model->getAboutDetails();

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
