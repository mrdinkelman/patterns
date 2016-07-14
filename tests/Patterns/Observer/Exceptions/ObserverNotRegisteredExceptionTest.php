<?php
namespace Patterns\Observer\Exceptions;

use Patterns\Observer\Observers\IObserver;

class ObserverNotRegisteredExceptionTest extends \PHPUnit_Framework_TestCase
{
    protected $tester;

    public function setUp()
    {
        $this->tester = new TestObserver();
    }

    public function testThrow()
    {
        $message = uniqid();
        $code = time();

        try {
            throw new ObserverNotRegisteredException(
                $this->tester,
                $message,
                $code
            );
        } catch (\Exception $ex) {
            $this->assertEquals($code, $ex->getCode());

            $formattedMessage = sprintf(
                ObserverNotRegisteredException::MESSAGE,
                (new \ReflectionClass($this->tester))->getShortName()
            );

            $this->assertStringStartsWith($formattedMessage, $ex->getMessage());
            $this->assertContains($message, $ex->getMessage());
        }
    }
}

class TestObserver implements IObserver
{
    protected $prop1;
    protected $prop2;
    protected $prop3;

    public function update($prop1, $prop2, $prop3)
    {
        return true;
    }
}

