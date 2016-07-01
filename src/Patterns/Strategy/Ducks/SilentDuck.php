<?php
/**
 * PHP version: 5.6+
 */
namespace Patterns\Strategy\Ducks;

use Patterns\Strategy\BaseDuck;

/**
 * Class SilentDuck
 * @package Patterns\Strategy\Ducks
 */
class SilentDuck extends BaseDuck
{
    const MESSAGE = "I'm %s and I can fly";

    /**
     * @return string
     */
    public function display()
    {
        return sprintf(static::MESSAGE, (new \ReflectionClass($this))->getShortName());
    }
}
