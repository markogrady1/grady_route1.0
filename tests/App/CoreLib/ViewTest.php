<?php namespace CoreLib;


class ViewTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instance of the View class
     * 
     * @var coreLib\View $view
     */
    public $view;

    public function setUp()
    {
        $this->view = new View();
    }

    /**
     * Test to ensure a boolean value of false is returned when a view does not exist
     * 
     * @return void
     */
    public function testResolveViewReturnsFalseWhenClassDoesNotExist()
    {
        $this->assertFalse(view::resolveView('somePath/someWhere/someFile.php', 'SomeClass', array('foo' => 'bar')));

    }

}
 
