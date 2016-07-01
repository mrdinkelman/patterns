<?php
/**
 * PHP version: 5.6+
 */
namespace Patterns\Strategy\FlyBehaviour;

/**
 * Class FlyNoWay
 * @package Patterns\Strategy\FlyBehaviour
 */
class FlyNoWay implements IFlyBehavior
{
    const MESSAGE = "I cant' fly :(";

    /**
     * @return string
     */
    public function fly()
    {
        return self::MESSAGE;
    }
}