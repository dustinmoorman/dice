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
        for ($i = 0; $i <= 50; $i++) {
            $this->assertEquals(1, preg_match('#^[1-5]$#', $result));
        }
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
