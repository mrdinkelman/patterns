<?php
namespace Patterns\Observer\Subject;

use Helpers\ObjectHash\IObjectHash;
use Helpers\ObjectHelper;
use Patterns\Observer\Exceptions\ObserverNotRegisteredException;
use Patterns\Observer\Observers\IObserver;

class WeatherData implements ISubject
{
    protected $observers = array();

    protected $temperature;

    protected $humidity;

    protected $pressure;

    /**
     * @var ObjectHa
     */
    protected $hashHelper;

    public function registerObserver(IObserver $observer)
    {
        if (array_key_exists($this->hashHelper->ha, $this->observers)) {
            return $this;
        }

        $this->observers[$hash] = $observer;

        return $this;
    }

    public function removeObserver(IObserver $observer)
    {
        $hash = ObjectHelper::hash($observer);

        if (!array_key_exists($hash, $this->observers)) {
            throw new ObserverNotRegisteredException($observer);
        }

        unset($this->observers[$hash]);

        return $this;
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $observer) {
            $observer->update(
                $this->getTemperature(),
                $this->getHumidity(),
                $this->getPressure()
            );
        }
    }

    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function setHumidity($humidity)
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function setPressure($pressure)
    {
        $this->pressure = $pressure;

        return $this;
    }

    public function getPressure()
    {
        return $this->pressure;
    }

    public function getHumidity()
    {
        return $this->humidity;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }

    public function setMeasurements($temperature, $humidity, $pressure)
    {
        $this
            ->setTemperature($temperature)
            ->setHumidity($humidity)
            ->setPressure($pressure)
            ->notifyObservers();

        return true;
    }

    public function setHashHelper(IObjectHash $hashHelper)
    {
        $this->hashHelper = $hashHelper;

        return $this;
    }


}