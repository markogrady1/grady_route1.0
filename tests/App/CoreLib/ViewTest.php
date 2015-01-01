<?php namespace CoreLib;


class ViewTest extends \PHPUnit_Framework_TestCase
{
    public $view;

    public function setUp()
    {
        $this->view = new View();
    }

    public function testResolveViewReturnsFalseWhenClassDoesNotExist()
    {
        $this->assertFalse(view::resolveView('somePath/someWhere/someFile.php', 'SomeClass', array('foo' => 'bar')));

    }

}
 