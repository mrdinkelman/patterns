<?php

namespace Tests\Patterns\Strategy\FlyBehaviour;

use Patterns\Strategy\FlyBehaviour\FlyWithWings;

class FlyWithWingsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Patterns\Strategy\FlyBehaviour\FlyWithWings
     */
    protected $test;

    public function setUp()
    {
        $this->test = new FlyWithWings();
    }

    public function testFly()
    {
        $this->assertEquals(FlyWithWings::MESSAGE, $this->test->fly());
    }
}
