<?php

require __DIR__ . '/../vendor/autoload.php';
use coreLib\Application;
use coreLib\Factory;

//start application
$factory = new Factory();
$application = new Application($factory);