<?php
namespace Tests\Patterns\Observer\Observers;

use Patterns\Observer\Observers\StatisticsDisplay;

class StatisticsDisplayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StatisticsDisplay
     */
    protected $tester;

    protected function setUp()
    {
        $this->tester = new StatisticsDisplay();
    }

    public function testUpdateAndDisplayElement()
    {
        $this->tester->update(11, 21, 31);

        $this->assertEquals(
            $expected = sprintf(
                StatisticsDisplay::MESSAGE,
                11,
                21,
                31
            ),
            $actual = $this->tester->displayElement(),
            sprintf("Expected %s. actual %s", $expected, $actual)
        );

        $this->tester->update(12, 22, 32);

        $this->assertEquals(
            $expected = sprintf(
                StatisticsDisplay::MESSAGE,
                (11 + 12) / 2,
                (21 + 22) / 2,
                (31 + 32) / 2
            ),
            $actual = $this->tester->displayElement(),
            sprintf("Expected %s. actual %s", $expected, $actual)
        );
    }

    public function testCalculateAverage()
    {
        $tester = new AverageTester();

        $this->assertEquals(
            $expected = (11 + 12 + 13 + 14 + 15) / 5,
            $actual = $tester->calculateAverage([11, 12, 13, 14, 15]),
            sprintf("Average expected: %s, actual: %s", $expected, $actual)
        );

        $this->assertEquals(0, $tester->calculateAverage([]));
    }
}

class AverageTester extends StatisticsDisplay
{
    public function calculateAverage($collection)
    {
        return parent::calculateAverage($collection);
    }
}
