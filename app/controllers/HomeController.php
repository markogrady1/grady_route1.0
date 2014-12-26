<?php namespace controllers;

use coreLib\View;


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

        $this->model = $this->acquireModel('HomeModel');

        $this->db = $this->model->getConnection();

        if ($this->db) {

            $this->data = $this->model->getLastPost();

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
