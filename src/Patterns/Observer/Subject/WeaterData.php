<?php
/**
 * PHP version: 5.6+
 */
namespace Patterns\Observer\Subject;

use Helpers\ObjectHashHelper;
use Patterns\Observer\Exceptions\ObserverNotRegisteredException;
use Patterns\Observer\Observers\IObserver;

/**
 * Class WeatherData
 * @package Patterns\Observer\Subject
 */
class WeatherData implements ISubject
{
    /**
     * Observers collection
     * If hash helper received, key in this collection
     * @var array
     */
    protected $observers = array();

    /**
     * Temperature, degrees C
     * @var float
     */
    protected $temperature;

    /**
     * Humidity
     *
     * @var float
     */
    protected $humidity;

    /**
     * Pressure
     *
     * @var float
     */
    protected $pressure;

    /**
     * @var ObjectHashHelper
     */
    protected $hashHelper;

    /**
     * Register new observer.
     * Observers collection may be unique, if hash helper exists
     *
     * @param IObserver $observer
     * @return $this
     */
    public function registerObserver(IObserver $observer)
    {
        // without hash helper just add new
        if (!$this->hashHelper) {
            array_push($this->observers, $observer);

            return $this;
        }

        // add unique
        $hash = $this->hashHelper->calculateHash($observer);

        if (array_key_exists($hash, $this->observers)) {
            return $this;
        }

        $this->observers[$hash] = $observer;

        return $this;
    }

    /**
     * Un-register observer
     * Generates ObserverNotRegisteredException if observer not registered
     *
     * @param IObserver $observer
     *
     * @return $this
     * @throws ObserverNotRegisteredException
     */
    public function removeObserver(IObserver $observer)
    {
        // find observer
        if (!$this->hashHelper) {
            $searchObserver = function($observer) {
                foreach ($this->observers as $index => $object) {
                    if ($object === $observer) {
                        return $index;
                    }
                }

                return null;
            };

            $index = $searchObserver($observer);

            if (null === $index) {
                throw new ObserverNotRegisteredException($observer);
            }

            unset($this->observers[$index]);

            return $this;
        }

        $hash = $this->hashHelper->calculateHash($observer);

        if (!array_key_exists($hash, $this->observers)) {
            throw new ObserverNotRegisteredException($observer);
        }

        unset($this->observers[$hash]);

        return $this;
    }

    /**
     * Notify observers about changes
     *
     * @return $this
     */
    public function notifyObservers()
    {
        foreach ($this->observers as $observer) {
            $observer->update(
                $this->getTemperature(),
                $this->getHumidity(),
                $this->getPressure()
            );
        }

        return $this;
    }

    /**
     * Set temperature
     *
     * @param $temperature
     *
     * @return $this
     */
    public function setTemperature($temperature)
    {
        $this->temperature = (float) $temperature;

        return $this;
    }

    /**
     * Set humidity
     *
     * @param $humidity
     *
     * @return $this
     */
    public function setHumidity($humidity)
    {
        $this->humidity = (float) $humidity;

        return $this;
    }

    /**
     * Set pressure
     *
     * @param $pressure
     *
     * @return $this
     */
    public function setPressure($pressure)
    {
        $this->pressure = (float) $pressure;

        return $this;
    }

    /**
     * Get pressure
     *
     * @return float
     */
    public function getPressure()
    {
        return $this->pressure;
    }

    /**
     * Get humidity
     *
     * @return float
     */
    public function getHumidity()
    {
        return $this->humidity;
    }

    /**
     * Get temperature
     *
     * @return float
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Set changes: temperature, humidity, pressure
     *
     * @param float $temperature
     * @param float $humidity
     * @param float $pressure
     *
     * @return bool
     */
    public function setMeasurements($temperature, $humidity, $pressure)
    {
        $this
            ->setTemperature($temperature)
            ->setHumidity($humidity)
            ->setPressure($pressure)
            ->notifyObservers();

        return true;
    }

    /**
     * Set hash helper, for generating unique observers list.
     * Optional method.
     *
     * @param ObjectHashHelper $hashHelper
     *
     * @return $this
     */
    public function setHashHelper(ObjectHashHelper $hashHelper)
    {
        $this->hashHelper = $hashHelper;

        return $this;
    }
}