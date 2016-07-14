<?php
/**
 * PHP version: 5.6+
 */
namespace Patterns\Observer\Observers;

/**
 * Class StatisticsDisplay
 * @package Patterns\Observer\Observers
 */
class StatisticsDisplay implements IObserver, IDisplay
{
    /**
     * Collection of temperatures
     * @var array
     */
    protected $temperature = [];

    /**
     * Collection of humanities
     * @var array
     */
    protected $humidity = [];

    /**
     * Collection of pressures
     * @var array
     */
    protected $pressure = [];

    /**
     * Message for displaying
     */
    const MESSAGE = "Average values: temperature %s C, humidity %s percentages, pressure %s GPa";

    /**
     * Add new values to collections
     *
     * @param $temperature
     * @param $humidity
     * @param $pressure
     * @return bool
     */
    public function update($temperature, $humidity, $pressure)
    {
        array_push($this->temperature, $temperature);
        array_push($this->humidity, $humidity);
        array_push($this->pressure, $pressure);

        $this->displayElement();

        return true;
    }

    /**
     * Display current statistics
     *
     * @return string
     */
    public function displayElement()
    {
        return sprintf(
            self::MESSAGE,
            $this->calculateAverage($this->temperature),
            $this->calculateAverage($this->humidity),
            $this->calculateAverage($this->pressure)
        );
    }

    /**
     * Calculate average value for collection
     *
     * @param array $collection
     *
     * @return float|int
     */
    protected function calculateAverage($collection)
    {
        if (count($collection) == 0) {
            return 0;
        }

        return array_sum($collection) / count($collection);
    }
}