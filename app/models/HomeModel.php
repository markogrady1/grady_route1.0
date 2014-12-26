<?php namespace models;

use coreLib\Base;

class HomeModel extends Base
{

    public function __construct()
    {

    }

    public function getLastPost()
    {
        $conditional = array(
            'ORDER BY',
            'id',
            'DESC',
            'LIMIT',
            '1'
        );

        $data = $this->get( "blgs", array(), $conditional);

        return $data;
    }

//    public function getAllPosts()
//    {
//
//        $data = $this->get('blgs',array(), array('ORDER BY','id', 'DESC' ));
//
//        return $data;
//    }
}


