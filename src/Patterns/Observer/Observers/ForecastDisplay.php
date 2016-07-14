<?php
/**
 * PHP version: 5.6+
 */
namespace Patterns\Observer\Observers;

/**
 * Class ForecastDisplay
 * @package Patterns\Observer\Observers
 */
class ForecastDisplay implements IObserver, IDisplay
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
    const MESSAGE = "Forecast values: temperature %s C, humidity %s percentages, pressure %s GPa";

    /**
     * Fake update forecast, just simple multiplies
     *
     * @param float $temperature temperature, degrees celsius
     * @param float $humidity    humidity
     * @param float $pressure    pressure
     *
     * @return bool
     */
    public function update($temperature, $humidity, $pressure)
    {
        $this->temperature = $temperature * 1.1;
        $this->humidity = $humidity * 1.2;
        $this->pressure = $pressure * 1.3;

        $this->displayElement();

        return true;
    }

    /**
     * Display current 'forecast'
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