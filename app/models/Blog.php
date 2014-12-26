<?php namespace models;

use coreLib\Base;

class Blog extends Base
{


    public function __construct()
    {
        //$this->getConnection();
    }

    public function getLastPost()
    {
//        $sql = "SELECT * FROM  blgs   ORDER BY id DESC LIMIT 1 ";
//        $data = $this->query($sql);

        $data = $this->get('blgs', array("id","=","54"));

        return $data;
    }

    public function getAllPosts()
    {
//        $sql = "SELECT * FROM blgs ORDER BY id";
//        $data = $this->query($sql);
        $data = $this->get('blgs',array(), array('ORDER BY','id', 'DESC' ));

        return $data;
    }
}

