<?php

namespace Patterns\Strategy\QuackBehaviour;

class SilenceQuack implements IQuackBehavior
{
    const MESSAGE = "Silence";

    public function quack()
    {
        return self::MESSAGE;
    }
}
