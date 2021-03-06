<?php
namespace Controllers;

use controllers\AboutController;

class AboutControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Mock PDO object
     * @var Mockery $PDOMock
     */
    private $PDOMock;
    private $modelMock;
    private $factoryMock;

    public function setUp()
    {
        list($this->factoryMock, $this->PDOMock, $this->modelMock) = $this->getMocks();
    }

    public function tearDown()
    {
        \Mockery::close();
    }

    public function testIndexMethodReturnsFalseWhenNoConnection()
    {
        $this->factoryMock->shouldReceive('getInstance')->andReturn($this->modelMock);
        $this->modelMock->shouldReceive('getConnection')->andReturn(null);
        $about = new AboutController($this->factoryMock);
        $data = $about->index();
        $this->assertFalse($data);

    }

    public function testIndexMethodResolvesPDOInstance()
    {
        $this->factoryMock->shouldReceive('getInstance')->andReturn($this->modelMock);
        $this->modelMock->shouldReceive('getConnection')->andReturn($this->PDOMock);
        $this->modelMock->shouldReceive('getAboutDetails')->andReturn(array('foo' => 'bar'));
        $about = new AboutController($this->factoryMock);
        $about->index();
        $pdo = $this->modelMock->getConnection();
        $this->assertEquals($this->PDOMock, $pdo);
    }

    public function testIndexMethodResolvesArray()
    {
        $this->factoryMock->shouldReceive('getInstance')->andReturn($this->modelMock);
        $this->modelMock->shouldReceive('getConnection')->andReturn($this->PDOMock);
        $this->modelMock->shouldReceive('getAboutDetails')->andReturn(array('foo' => 'bar'));
        $about = new AboutController($this->factoryMock);
        $data = $this->modelMock->getAboutDetails();
        $about->index();
        $this->assertEquals('bar', $data['foo']);
    }

    private function getMocks()
    {
        return array(
            \Mockery::mock('coreLib\Factory'),
            \Mockery::mock('PDO'),
            \Mockery::mock('HomeModel'),
        );
    }


}
 
