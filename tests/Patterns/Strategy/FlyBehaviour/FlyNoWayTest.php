<?php
namespace Tests\Patterns\Strategy\FlyBehaviour;

use Patterns\Strategy\FlyBehaviour\FlyNoWay;

class FlyNoWayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Patterns\Strategy\FlyBehaviour\FlyNoWay
     */
    protected $test;

    public function setUp()
    {
        $this->test = new FlyNoWay();
    }

    public function testFly()
    {
        $this->assertEquals(FlyNoWay::MESSAGE, $this->test->fly());
    }
}
