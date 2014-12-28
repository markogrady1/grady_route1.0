<?php namespace Controllers;

use controllers\BlogController;

class BlogControllerTest extends \PHPUnit_Framework_TestCase
{


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
        $blog = new BlogController($this->factoryMock);
        $data = $blog->index();
        $this->assertFalse($data);

    }

    public function testIndexMethodResolves_PDOInstance()
    {
        $this->factoryMock->shouldReceive('getInstance')->andReturn($this->modelMock);
        $this->modelMock->shouldReceive('getConnection')->andReturn($this->PDOMock);
        $this->modelMock->shouldReceive('getAllPosts')->andReturn(array('foo' => 'bar'));
        $blog = new BlogController($this->factoryMock);
        $blog->index();
        $pdo = $this->modelMock->getConnection();
        $this->assertEquals($this->PDOMock, $pdo);
    }

    public function testIndexMethodResolvesArray()
    {
        $this->factoryMock->shouldReceive('getInstance')->andReturn($this->modelMock);
        $this->modelMock->shouldReceive('getConnection')->andReturn($this->PDOMock);
        $this->modelMock->shouldReceive('getAllPosts')->andReturn(array('foo' => 'bar'));
        $blog = new BlogController($this->factoryMock);
        $data = $this->modelMock->getAllPosts();
        $blog->index();
        $this->assertEquals('bar', $data['foo']);
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
 