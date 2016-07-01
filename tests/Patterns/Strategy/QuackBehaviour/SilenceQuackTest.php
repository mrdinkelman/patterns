<?php

namespace Tests\Patterns\Strategy\QuackBehavior;

use Patterns\Strategy\QuackBehaviour\SilenceQuack;

class SilenceQuackTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Patterns\Strategy\QuackBehaviour\SilenceQuack
     */
    protected $tester;

    public function setUp()
    {
        $this->tester = new SilenceQuack();
    }

    public function testQuack()
    {
        $this->assertEquals(SilenceQuack::MESSAGE, $this->tester->quack());
    }
}
