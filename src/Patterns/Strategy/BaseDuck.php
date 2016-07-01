<?php

namespace Patterns\Strategy;

use Patterns\Strategy\FlyBehaviour\IFlyBehavior;
use Patterns\Strategy\QuackBehaviour\IQuackBehavior;

/**
 * Class BaseDuck
 * @package Patterns\Strategy
 */
abstract class BaseDuck
{
    const MESSAGE = "Hello, I'm %s\n";

    protected $quackBehaviour;
    protected $flyBehavior;

    /**
     * BaseDuck constructor.
     *
     * @param IQuackBehavior $quackBehavior
     * @param IFlyBehavior $flyBehavior
     */
    public function __construct(IQuackBehavior $quackBehavior, IFlyBehavior $flyBehavior)
    {
        $this->quackBehaviour = $quackBehavior;
        $this->flyBehavior = $flyBehavior;
    }

    /**
     * @return mixed
     */
    abstract public function display();

    /**
     * @return $this
     */
    public function performQuack()
    {
        return sprintf("%s: %s\n", __METHOD__, $this->quackBehaviour->quack());
    }

    /**
     * @return string
     */
    public function performFly()
    {
        return sprintf("%s: %s\n", __METHOD__, $this->flyBehavior->fly());
    }

    public function swim()
    {
        return sprintf("%s: All ducks can swim\n", __METHOD__);
    }

    public function setFlyBehavior(IFlyBehavior $flyBehavior)
    {
        $this->flyBehavior = $flyBehavior;

        return $this;
    }

    public function setQuackBehaviour(IQuackBehavior $quackBehaviour)
    {
        $this->quackBehaviour = $quackBehaviour;

        return $this;
    }

    /**
     * @return IQuackBehavior
     */
    public function getQuackBehaviour()
    {
        return $this->quackBehaviour;
    }

    /**
     * @return IFlyBehavior
     */
    public function getFlyBehavior()
    {
        return $this->flyBehavior;
    }





}