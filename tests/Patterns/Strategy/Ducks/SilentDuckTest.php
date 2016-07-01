<?php
namespace Tests\Patterns\Strategy\Ducks;

use Patterns\Strategy\Ducks\SilentDuck;
use Patterns\Strategy\FlyBehaviour\FlyWithWings;
use Patterns\Strategy\QuackBehaviour\SilenceQuack;

class SilentDuckTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Patterns\Strategy\Ducks\SilentDuck
     */
    protected $duck;

    public function setUp()
    {
        $this->duck = new SilentDuck(
            new SilenceQuack(),
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
