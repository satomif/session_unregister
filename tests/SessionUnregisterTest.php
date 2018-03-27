<?php
namespace Satomif\SessionUnregister\Tests;

class SessionUnregisterTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        session_start();
        $_SESSION['hello'] = 'world';
    }

    /**
     * @runInSeparateProcess
     */
    public function testSessionUnregister()
    {
        $return = \session_unregister('hello');

        $this->assertArrayNotHasKey('hello', $_SESSION);
        $this->assertTrue($return);
    }

    /**
     * @runInSeparateProcess
     */
    public function testSessionUnregisterFail()
    {
        $return = \session_unregister('hello2');
        $this->assertFalse($return);
    }
}