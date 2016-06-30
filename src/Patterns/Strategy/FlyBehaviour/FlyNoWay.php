<?php

namespace Patterns\Strategy\FlyBehaviour;

class FlyNoWay implements IFlyBehavior
{
    const MESSAGE = "I cant' fly :(";

    public function fly()
    {
        return self::MESSAGE;
    }
}