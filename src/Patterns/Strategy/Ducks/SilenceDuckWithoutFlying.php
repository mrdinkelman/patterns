<?php

namespace Patterns\Strategy\Ducks;

use Patterns\Strategy\BaseDuck;

class SilenceDuckWithoutFlying extends BaseDuck
{
    const MESSAGE = "I'm %s duck. I can't fly and quack";

    public function display()
    {
        return sprintf(static::MESSAGE, (new \ReflectionClass($this))->getShortName());
    }
}