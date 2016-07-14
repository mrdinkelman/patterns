<?php
/**
 * PHP version: 5.6+
 */
namespace Patterns\Observer\Exceptions;

use Patterns\Observer\Observers\IObserver;

/**
 * Class ObserverNotRegisteredException
 * @package Patterns\Observer\Exceptions
 */
class ObserverNotRegisteredException extends \Exception
{
    /**
     * @var string
     */
    const MESSAGE = "Observer %s not registered yet. Please register them first.";

    /**
     * ObserverNotRegisteredException constructor.
     * @param IObserver $observer
     * @param string $message
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct(IObserver $observer, $message = "", $code = 0, \Exception $previous = null)
    {
        $exMessage = self::MESSAGE;

        if (!empty($message)) {
            $exMessage = sprintf("%s [%s]", self::MESSAGE, $message);
        }

        parent::__construct(
            sprintf(
                $exMessage,
                (new \ReflectionClass($observer))->getShortName()
            ),
            $code,
            $previous
        );
    }
}