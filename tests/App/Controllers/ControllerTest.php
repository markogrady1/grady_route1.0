<?php namespace Controllers;

//require "../../../vendor/autoload.php"; //not required in phpstorm

use controllers\Controller as Control;


class ControllerTest extends \PHPUnit_Framework_TestCase
{

    public $factoryMock;
    public $modelMock;

    public function setUp()
    {
        list($this->factoryMock, $this->modelMock) = $this->getMocks();
    }

    public function tearDown()
    {
        \Mockery::close();
    }

    public function testAcquireModel()
    {
        $this->factoryMock->shouldReceive('getInstance')->andReturn($this->modelMock);

        $controller = new Control($this->factoryMock);

        $model = $controller->acquireModel('HomeModel');

        $this->assertEquals($this->modelMock, $model);
    }

    protected function getMocks()
    {
        return array(
            \Mockery::mock('coreLib\Factory'),
            \Mockery::mock('HomeModel'),
        );
    }
}
