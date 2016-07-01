<?php
/**
 * PHP version: 5.6+
 */
namespace Patterns\Strategy\FlyBehaviour;

class FlyWithWings implements IFlyBehavior
{
    const MESSAGE = "I'm flying with wings";

    /**
     * @return string
     */
    public function fly()
    {
        return self::MESSAGE;
    }
}