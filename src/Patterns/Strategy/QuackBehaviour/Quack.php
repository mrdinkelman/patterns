<?php

namespace Patterns\Strategy\QuackBehaviour;

class Quack implements IQuackBehavior
{
    const MESSAGE = "Quack!";

    public function quack()
    {
        return self::MESSAGE;
    }
}