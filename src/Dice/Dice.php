<?php
/**
 * Dice
 * @author Dustin Moorman <dustinmoorman@gmail.com>
 *
 * Rolled by a dice roller. Dustinmoorman\Dice\Dice::roll() returns a random number.
 */

namespace Dustinmoorman\Dice;

class Dice
{
    /**
     * Number of sides on the die, effectively the maximum
     * value returnable.
     * @var int
     */
    protected $_sides;

    /**
     * Creates the die with sides, if provided.
     * @param int | null $sides
     */
    public function __construct($sides = null)
    {
        if (!empty($sides)) {
            $this->setSides($sides);
        }
    }

    /**
     * Sets a number of sides on this dice.
     * @param int $sides
     */
    public function setSides($sides)
    {
        if (is_numeric($sides)) {
            $this->_sides = $sides;
        } else {
            throw new \InvalidArgumentException("Not a valid value for sides.");
        }
    }

    /**
     * Generates random dice roll.
     */
    public function roll()
    {
        if (!is_numeric($this->_sides)) {
            throw new \Exception("Sides must be set on die before roll.");
        }

        return mt_rand(1, $this->_sides);
    }
}
