<?php namespace Controllers;

use controllers\HomeController;

class HomeControllerTest extends \PHPUnit_Framework_TestCase
{
    public $factoryMock;
    public $modelMock;
    public $PDOMock;

    public function setUp()
    {
        list($this->factoryMock, $this->PDOMock, $this->modelMock) = $this->getMocks();
    }

    public function tearDown()
    {
        \Mockery::close();
    }

    public function testIndexMethodResolves_PDOInstance()
    {
        $this->factoryMock->shouldReceive('getInstance')->andReturn($this->modelMock);
        $this->modelMock->shouldReceive('getConnection')->andReturn($this->PDOMock);
        $this->modelMock->shouldReceive('getLastPost')->andReturn(array('foo' => 'bar'));
        $homeController = new HomeController($this->factoryMock);
        $homeController->index();
        $db = $this->modelMock->getConnection();
        $this->assertEquals($this->PDOMock, $db);

    }

    public function testIndexMethodResolvesArray()
    {
        $this->factoryMock->shouldReceive('getInstance')->andReturn($this->modelMock);
        $this->modelMock->shouldReceive('getConnection')->andReturn($this->PDOMock);
        $this->modelMock->shouldReceive('getLastPost')->andReturn(array('foo' => 'bar'));
        $homeController = new HomeController($this->factoryMock);
        $homeController->index();
        $dataArray = $this->modelMock->getLastPost();
        $this->assertEquals('bar', $dataArray['foo']);

    }

    public function testIndexMethodReturnsFalseWhenNoConnection()
    {
        $this->factoryMock->shouldReceive('getInstance')->andReturn($this->modelMock);
        $this->modelMock->shouldReceive('getConnection')->andReturn(null);
        $homeController = new HomeController($this->factoryMock);
        $data = $homeController->index();
        $this->assertFalse($data);

    }

    protected function getMocks()
    {
        return array(
            \Mockery::mock('coreLib\Factory'),
            \Mockery::mock('PDO'),
            \Mockery::mock('HomeModel'),
        );
    }

}
 