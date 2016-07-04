<?php

namespace Patterns\Observer\Observers;

class CurrentConditionDisplay implements IObserver, IDisplay
{
    protected $temperature;

    protected $humidity;

    protected $pressure;

    const MESSAGE = "Current values: temperature %s C, humidity %s %, pressure %s GPa";

    public function update($temperature, $humidity, $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;

        $this->displayElement();

        return true;
    }

    public function displayElement()
    {
        return sprintf(
            self::MESSAGE,
            $this->temperature,
            $this->humidity,
            $this->pressure
        );
    }
}