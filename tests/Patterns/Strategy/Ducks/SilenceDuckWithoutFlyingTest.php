<?php
namespace Tests\Patterns\Strategy\Ducks;

use Patterns\Strategy\Ducks\SilenceDuckWithoutFlying;
use Patterns\Strategy\FlyBehaviour\FlyNoWay;
use Patterns\Strategy\QuackBehaviour\SilenceQuack;

class SilenceDuckWithoutFlyingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Patterns\Strategy\Ducks\SilentDuck
     */
    protected $duck;

    public function setUp()
    {
        $this->duck = new SilenceDuckWithoutFlying(
            new SilenceQuack(),
            new FlyNoWay()
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
