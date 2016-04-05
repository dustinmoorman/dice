<?php

namespace Tests\Dice;

class RollerTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnTrue()
    {
        $this->assertTrue(true);
    }

    public function testLoadRollerWith1d20Succeeds()
    {
        $roller = new \Dustinmoorman\Dice\Roller('1d20');
        $this->assertInternalType('array', $roller->roll());
    }

    public function testLoadRollerWithD4Succeeds()
    {
        $roller = new \Dustinmoorman\Dice\Roller('d4');
        $this->assertInternalType('array', $roller->roll());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testLoadRollerWith1X9Excepts()
    {
        $roller = new \Dustinmoorman\Dice\Roller('1X9');
        $roller->roll();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testLoadRollerWithF1d5Excepts()
    {
        $roller = new \Dustinmoorman\Dice\Roller('f1d5');
        $roller->roll();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testLoadRollerWith1d53eExcepts()
    {
        $roller = new \Dustinmoorman\Dice\Roller('1d53e');
        $roller->roll();
    }
}
