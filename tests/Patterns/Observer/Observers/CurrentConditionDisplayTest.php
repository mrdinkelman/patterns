<?php
namespace Tests\Patterns\Observer\Observers;

use Patterns\Observer\Observers\CurrentConditionDisplay;

class CurrentConditionDisplayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CurrentConditionDisplay
     */
    protected $tester;

    public function setUp()
    {
        $this->tester = new CurrentConditionDisplay();
    }

    public function testUpdateAndDisplayElement()
    {
        $this->tester->update(1, 2, 3);

        $prototype = sprintf(CurrentConditionDisplay::MESSAGE, 1, 2, 3);
        $actual = $this->tester->displayElement();

        $this->assertEquals($prototype, $actual, sprintf("Expected: %s, received: %s", $prototype, $actual));
    }
}
