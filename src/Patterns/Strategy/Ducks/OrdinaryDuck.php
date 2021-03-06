<?php
/**
 * PHP version: 5.6+
 */
namespace Patterns\Strategy\Ducks;

use Patterns\Strategy\BaseDuck;

/**
 * Class OrdinaryDuck
 * @package Patterns\Strategy\Ducks
 */
class OrdinaryDuck extends BaseDuck
{
    /**
     * @return string
     */
    public function display()
    {
        return sprintf(self::MESSAGE, (new \ReflectionClass($this))->getShortName());
    }
}