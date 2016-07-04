<?php
/**
 * PHP version: 5.6+
 */
namespace Patterns\Strategy;

use Patterns\Strategy\FlyBehaviour\IFlyBehavior;
use Patterns\Strategy\QuackBehaviour\IQuackBehavior;

/**
 * Class BaseDuck
 * @package Patterns\Strategy
 */
abstract class BaseDuck
{
    const MESSAGE = "Hello, I'm %s";

    const MESsAGE_SWIM = "%s: All ducks can swim";
    const MESSAGE_METHOD = "%s: %s";

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
     * Display: common for all ducks
     *
     * @return mixed
     */
    abstract public function display();

    /**
     * Quack!
     *
     * @return $this
     */
    public function performQuack()
    {
        return sprintf(self::MESSAGE_METHOD, __METHOD__, $this->quackBehaviour->quack());
    }

    /**
     * Fly!
     *
     * @return string
     */
    public function performFly()
    {
        return sprintf(self::MESSAGE_METHOD, __METHOD__, $this->flyBehavior->fly());
    }

    /**
     * All ducks can swim in any case
     *
     * @return string
     */
    public function swim()
    {
        return sprintf(self::MESsAGE_SWIM, __METHOD__);
    }

    /**
     * Runtime change for fly behaviour
     *
     * @param IFlyBehavior $flyBehavior
     *
     * @return $this
     */
    public function setFlyBehavior(IFlyBehavior $flyBehavior)
    {
        $this->flyBehavior = $flyBehavior;

        return $this;
    }

    /**
     * Runtime change for quack behaviour
     *
     * @param IQuackBehavior $quackBehaviour
     *
     * @return $this
     */
    public function setQuackBehaviour(IQuackBehavior $quackBehaviour)
    {
        $this->quackBehaviour = $quackBehaviour;

        return $this;
    }

    /**
     * Get current quack behaviour
     *
     * @return IQuackBehavior
     */
    public function getQuackBehaviour()
    {
        return $this->quackBehaviour;
    }

    /**
     * Get current fly behaviour
     *
     * @return IFlyBehavior
     */
    public function getFlyBehavior()
    {
        return $this->flyBehavior;
    }
}
