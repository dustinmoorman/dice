<?php

namespace Tests\Dice;

class DiceTest extends \PHPUnit_Framework_TestCase
{
    public function testRoll()
    {
        $dice = new \Dustinmoorman\Dice\Dice(5);

        for ($rolls = 0; $rolls <= 50; $rolls++) {
            $result = $dice->roll();

            $this->assertInternalType('int', $result);
            $this->assertTrue($result <= 5);
            $this->assertTrue($result >= 1);
            $this->assertEquals(1, preg_match('#^[1-5]$#', $result));
        }
    }

    public function testSetSides()
    {
        $dice = new \Dustinmoorman\Dice\Dice();
        $dice->setSides(20);

        for ($rolls = 0; $rolls <= 50; $rolls++) {
            $result = $dice->roll();

            $this->assertInternalType('int', $result);
            $this->assertTrue($result <= 20);
            $this->assertTrue($result >= 1);
        }

    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetSidesWithInvalidValueExcepts()
    {
        $dice = new \Dustinmoorman\Dice\Dice();
        $dice->setSides('H');
        $dice->roll();
    }

    /**
     * @expectedException \Exception
     */
    public function testRollWithNoSidesExcepts()
    {
        $dice = new \Dustinmoorman\Dice\Dice();
        $dice->roll();
    }
}
