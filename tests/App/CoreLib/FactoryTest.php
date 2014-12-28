<?php namespace CoreLib;

//use controllers\BlogController;
//use controllers\HomeController;
use coreLib\Factory;
use models\Blog;


class FactoryTest extends \PHPUnit_Framework_TestCase
{
    public $homeMock;
    public $aboutMock;
    public $blogMock;
    public $factoryMock;

    public function setUp()
    {
        list($this->blogMock, $this->factoryMock, $this->homeMock, $this->aboutMock) = $this->getMocks();
    }

    public function tearDown()
    {
        \Mockery::close();
    }

    public function testResolvingBlogControllerFromFactory()
    {
        $factory = new Factory();
        $instance = $factory->getInstance('BlogController');
        $this->assertInstanceOf('BlogController', $instance);
    }

    public function testResolvingHomeControllerFromFactory()
    {
        $factory = new Factory();
        $instance = $factory->getInstance('HomeController');
        $this->assertInstanceOf('HomeController', $instance);
    }

    public function testResolvingAboutControllerFromFactory()
    {
        $factory = new Factory();
        $instance = $factory->getInstance('AboutController');
        $this->assertInstanceOf('AboutController', $instance);
    }

    public function getMocks()
    {
        return array(
            \Mockery::mock('HomeController'),
            \Mockery::mock('AboutController'),
            \Mockery::mock('BlogController'),
            \Mockery::mock('coreLib\Factory'),
        );
    }
}
 