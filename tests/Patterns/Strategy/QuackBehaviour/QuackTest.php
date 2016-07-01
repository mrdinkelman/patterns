<?php
namespace Tests\Patterns\Strategy\QuackBehavior;

use Patterns\Strategy\QuackBehaviour\Quack;

class QuackTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Patterns\Strategy\QuackBehaviour\Quack
     */
    protected $tester;

    public function setUp()
    {
        $this->tester = new Quack();
    }

    public function testQuack()
    {
        $this->assertEquals(Quack::MESSAGE, $this->tester->quack());
    }
}
