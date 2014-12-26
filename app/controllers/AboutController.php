<?php namespace controllers;

use coreLib\View;

class AboutController extends Controller
{
    private $data;

    public function index()
    {

        $this->model = $this->acquireModel('About');

        $this->db = $this->model->getConnection();

        if ($this->db) {

            $this->data = $this->model->getAboutDetails();

            View::render('../app/views/home.php',  $this->data);

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
