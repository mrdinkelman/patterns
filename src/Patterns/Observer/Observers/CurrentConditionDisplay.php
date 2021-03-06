<?php
/**
 * PHP version: 5.6+
 */
namespace Patterns\Observer\Observers;

/**
 * Class CurrentConditionDisplay
 * @package Patterns\Observer\Observers
 */
class CurrentConditionDisplay implements IObserver, IDisplay
{
    /**
     * Temperature
     * @var float
     */
    protected $temperature;

    /**
     * Humidity
     * @var float
     */
    protected $humidity;

    /**
     * Pressure
     * @var float
     */
    protected $pressure;

    /**
     * Message for displaying
     */
    const MESSAGE = "Current values: temperature %s C, humidity %s percentages, pressure %s GPa";

    /**
     * Update current display
     *
     * @param float $temperature temperature, degrees celsius
     * @param float $humidity    humidity
     * @param float $pressure    pressure
     *
     * @return bool
     */
    public function update($temperature, $humidity, $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;

        $this->displayElement();

        return true;
    }

    /**
     * Show current value in display
     *
     * @return string
     */
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