<?php

namespace Dustinmoorman\Dice;

class Roller
{
    protected $_rollText;
    protected $_count;
    protected $_sides;
    protected $_results;

    /**
     * Roller constructor, set if provided - if not, no worries.
     * @param string $roll
     */
    public function __construct($rollText = null)
    {
        if (!empty($rollText)) {
            $this->loadRoll($rollText);
        }

        $this->_results = [];
    }

    /**
     * Sets up the roll.
     * 
     * Rolls must be declared in a special fashion. 
     * For example:
     *
     *  1d6 - One six sided die.
     *  6d20 - Six twenty sided dice. 
     *  d40 - One fourty sided die.
     */
    public function loadRoll($rollText)
    {
        if (preg_match('#^[0-9]*(d)[0-9]+$#', $rollText) === 1) { 
            list($this->_count, $this->_sides) = explode("d", $rollText);

            if (empty($this->_count)) {
                $this->_count = 1;
            }
        } else {
            throw new \InvalidArgumentException("Roll '{$rollText}' is invalid.");
        }

        echo "Rolling {$this->_count} die, {$this->_sides} sides";

        $this->_rollText = $rollText;
    }

    /**
     * Roll creates the dice based on the roll text, and 
     * rolls it accordingly.
     */
    public function roll()
    {
        if (!is_numeric($this->_sides)) {
            throw new Exception("Invalid number of sides, can't find a dice to roll!");
        }

        for ($i = 1; $i <= $this->_count; $i++) { 
            $this->_results[] = $this->getDice()->roll();
        }

        return $this->_results;
    }


    /**
     * Gets a Die object for rolling.
     * @return \Dustinmoorman\Dice\Die
     */ 
    protected function getDice()
    {
        return new Dice($this->_sides);
    }
}
