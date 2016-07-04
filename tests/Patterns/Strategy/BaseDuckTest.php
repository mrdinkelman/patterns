<?php
namespace Patterns\Strategy;

use Patterns\Strategy\FlyBehaviour\IFlyBehavior;
use Patterns\Strategy\QuackBehaviour\IQuackBehavior;

class BaseDuckTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TestDuck
     */
    protected $tester;

    public function setUp()
    {
        $this->tester = new TestDuck(
            new TestQuackBehavior(), new TestFlyBehavior()
        );
    }

    public function testPerformQuack()
    {
        $this->assertContains(
            (new \ReflectionMethod($this->tester, 'performQuack'))->getName(),
            $this->tester->performQuack()
        );

        $this->assertContains(TestQuackBehavior::MESSAGE, $this->tester->performQuack());
    }

    public function testPerformFly()
    {
        $this->assertContains(
            (new \ReflectionMethod($this->tester, 'performFly'))->getName(),
            $this->tester->performFly()
        );

        $this->assertContains(TestFlyBehavior::MESSAGE, $this->tester->performFly());
    }

    public function testSwim()
    {
        $this->assertContains(
            (new \ReflectionMethod($this->tester, 'swim'))->getName(),
            $this->tester->swim()
        );
    }

    public function testGetQuackBehaviour()
    {
        $quackBehavior = new TestQuackBehavior();
        $this->tester->setQuackBehaviour($quackBehavior);

        $this->assertSame($quackBehavior, $this->tester->getQuackBehaviour());
    }

    public function testGetFlyBehavior()
    {
        $flyBehaviour = new TestFlyBehavior();
        $this->tester->setFlyBehavior($flyBehaviour);

        $this->assertSame($flyBehaviour, $this->tester->getFlyBehavior());
    }
}

class TestDuck extends BaseDuck
{
    public function display()
    {
        return "Hello, I'm Test duck!";
    }
}

class TestFlyBehavior implements IFlyBehavior
{
    const MESSAGE = "Test TestFlyBehavior fly";

    public function fly()
    {
        return self::MESSAGE;
    }
}

class TestQuackBehavior implements IQuackBehavior
{
    const MESSAGE = "Test TestQuackBehavior quack";

    public function quack()
    {
        return self::MESSAGE;
    }
}
