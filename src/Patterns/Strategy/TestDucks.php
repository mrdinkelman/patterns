<?php

require_once dirname(__FILE__)."/../../../vendor/autoload.php";

$test = new \Patterns\Strategy\Ducks\OrdinaryDuck(
    new \Patterns\Strategy\QuackBehaviour\SilenceQuack(),
    new \Patterns\Strategy\FlyBehaviour\FlyWithWings()
);
$test
    ->display()
    ->performQuack()
    ->performFly()
    ->swim();