<?php
/**
 * PHP version: 5.6+
 */
namespace Patterns\Strategy\Ducks;

use Patterns\Strategy\BaseDuck;

/**
 * Class DuckWithoutFlying
 * @package Patterns\Strategy\Ducks
 */
class DuckWithoutFlying extends BaseDuck
{
    const MESSAGE = "Hey there! I'm %s and I'm not an ordinary duck. I can't fly :(";

    /**
     * @return string
     */
    public function display()
    {
        return sprintf(static::MESSAGE, (new \ReflectionClass($this))->getShortName());
    }
}