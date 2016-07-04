<?php

namespace Patterns\Observer\Exceptions;

use Patterns\Observer\Observers\IObserver;

class ObserverNotRegisteredException extends \Exception
{
    protected $message = "Observer %s not registered yet. Please register them first %s";

    public function __construct(IObserver $observer, $message = "", $code = 0, \Exception $previous = null)
    {
        if (strlen($message) > 0) {
            $message = str_replace("[details]", ": ", $this->message);
        }

        parent::__construct(
            sprintf(
                $this->message,
                (new \ReflectionClass($observer))->getShortName(),
                strlen($message) > 0 ? sprintf(": %s", $message) : $message
            ),
            $code,
            $previous
        );
    }
}