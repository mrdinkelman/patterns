<?php
namespace Patterns\Observer\Subject;

use Patterns\Observer\Observers\IObserver;

interface ISubject
{
    public function registerObserver(IObserver $observer);

    public function removeObserver(IObserver $observer);

    public function notifyObservers();
}