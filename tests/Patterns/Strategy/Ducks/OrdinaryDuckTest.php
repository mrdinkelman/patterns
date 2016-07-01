<?php

namespace Tests\Patterns\Strategy\Ducks;

use Patterns\Strategy\Ducks\OrdinaryDuck;
use Patterns\Strategy\FlyBehaviour\FlyWithWings;
use Patterns\Strategy\QuackBehaviour\Quack;

class OrdinaryDuckTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Patterns\Strategy\Ducks\OrdinaryDuck
     */
    protected $duck;

    public function setUp()
    {
        $this->duck = new OrdinaryDuck(
            new Quack(),
            new FlyWithWings()
        );
    }

    public function testDisplay()
    {
        $this->assertContains(
            (new \ReflectionClass($this->duck))->getShortName(),
            $this->duck->display()
        );
    }
}
