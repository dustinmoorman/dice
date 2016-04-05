<?php

namespace Dustinmoorman\Dice;

class Dice
{
    /**
     * Number of sides on the die, effectively the maximum
     * value returnable.
     */
    protected $_sides;

    public function __construct($sides = null)
    {
        if (is_numeric($sides)) {
            $this->_sides = $sides;
        }
    }

    /**
     * Generates random dice roll.
     */
    public function roll()
    {
        if (!is_numeric($this->_sides)) {
            throw new \Exception("Sides not set, can't roll dice.");
        }

        return mt_rand(1, $this->_sides);
    }
}
