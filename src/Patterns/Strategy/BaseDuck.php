<?php

namespace Patterns\Strategy;

use Patterns\Strategy\FlyBehaviour\IFlyBehavior;
use Patterns\Strategy\QuackBehaviour\IQuackBehavior;

abstract class BaseDuck
{
    protected $quackBehaviour;
    protected $flyBehavior;

    public function __construct(IQuackBehavior $quackBehavior, IFlyBehavior $flyBehavior)
    {
        $this->quackBehaviour = $quackBehavior;
        $this->flyBehavior = $flyBehavior;
    }

    abstract public function display();

    public function performQuack()
    {
        echo sprintf("%s: %s\n", __METHOD__, $this->quackBehaviour->quack());

        return $this;
    }

    public function performFly()
    {
        echo sprintf("%s: %s\n", __METHOD__, $this->flyBehavior->fly());

        return $this;
    }

    public function swim()
    {
        echo sprintf("%s: All ducks can swim\n", __METHOD__);

        return $this;
    }

}