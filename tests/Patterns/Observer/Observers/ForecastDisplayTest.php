<?php
namespace Tests\Patterns\Observer\Observers;

use Patterns\Observer\Observers\ForecastDisplay;

class ForecastDisplayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ForecastDisplay
     */
    protected $tester;

    public function setUp()
    {
        $this->tester = new ForecastDisplay();
    }

    public function testUpdateAndDisplayElement()
    {
        $this->tester->update(1, 2, 3);

        $prototype = sprintf(ForecastDisplay::MESSAGE, 1 * 1.1, 2 * 1.2, 3 * 1.3);
        $actual = $this->tester->displayElement();

        $this->assertEquals($prototype, $actual, sprintf("Expected: %s, received: %s", $prototype, $actual));
    }
}
