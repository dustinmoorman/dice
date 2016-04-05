<?php

namespace Tests\Dice;

class DiceTest extends \PHPUnit_Framework_TestCase
{
    public function testRoll()
    {
        $dice = new \Dustinmoorman\Dice\Dice(5);
        $result = $dice->roll();

        $this->assertInternalType('int', $result);

        //50 chances to go out of range
        for ($rolls = 0; $rolls <= 50; $rolls++) {
            $this->assertEquals(1, preg_match('#^[1-5]$#', $result));
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
