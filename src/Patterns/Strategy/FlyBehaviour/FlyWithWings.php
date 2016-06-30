<?php

namespace Patterns\Strategy\FlyBehaviour;

class FlyWithWings implements IFlyBehavior
{
    const MESSAGE = "I'm flying with wings";

    public function fly()
    {
        echo self::MESSAGE;
    }
}