<?php namespace models;

use coreLib\Base;

class About extends Base
{

    public function getAboutDetails()
    {
        $data = $this->get('about', array());

        return $data;
    }
}