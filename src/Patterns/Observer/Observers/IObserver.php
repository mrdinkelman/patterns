<?php
namespace Patterns\Observer\Observers;

interface IObserver
{
    public function update($temperature, $humidity, $pressure);
}