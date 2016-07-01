<?php

namespace Tests\Patterns\Strategy\Ducks;

use Patterns\Strategy\Ducks\DuckWithoutFlying;
use Patterns\Strategy\FlyBehaviour\FlyWithWings;
use Patterns\Strategy\QuackBehaviour\Quack;


class DuckWithoutFlyingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Patterns\Strategy\Ducks\OrdinaryDuck
     */
    protected $duck;

    public function setUp()
    {
        $this->duck = new DuckWithoutFlying(
            new Quack(),
            new FlyWithWings()
        );
    }

    public function testDisplay()
    {
        $message = sprintf(
            DuckWithoutFlying::MESSAGE,
            (new \ReflectionClass($this->duck))->getShortName()
        );

        $this->assertContains(
            (new \ReflectionClass($this->duck))->getShortName(),
            $this->duck->display()
        );

        $this->assertEquals($message, $this->duck->display());
    }
}
