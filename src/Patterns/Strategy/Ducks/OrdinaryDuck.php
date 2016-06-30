<?php

namespace Patterns\Strategy\Ducks;

use Patterns\Strategy\BaseDuck;

class OrdinaryDuck extends BaseDuck
{
    public function display()
    {
        echo sprintf("Hello, I'm %s\n", (new \ReflectionClass($this))->getShortName());

        return $this;
    }
}