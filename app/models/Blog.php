<?php namespace models;

use coreLib\Base;

class Blog extends Base
{

    public function __construct()
    {

    }

    public function getLastPost()
    {

        $data = $this->get('blgs', array("id","=","54"));

        return $data;
    }

    public function getAllPosts()
    {

        $data = $this->get('blgs',array(), array('ORDER BY','id', 'DESC' ));

        return $data;
    }
}

