<?php

namespace Dustinmoorman\Dice;

class Roller
{
    protected $_rollText;
    protected $_rollCount;
    protected $_Die;
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

        $this->_results = array();
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
            list($count, $sides) = explode("d", $rollText);
        } else {
            throw new \InvalidArgumentException("Roll '{$rollText}' is invalid.");
        }

        echo "Rolling {$count} die, {$sides} sides";

        $this->_rollText = $rollText;
    }

    /**
     * Roll creates the dice based on the roll text, and 
     * rolls it accordingly.
     */
    public function roll()
    {
        if (empty($this->_rollText)) {
            throw new \Exception("No dice to roll.");
        }

        echo "Roll: {$this->_rollText}\n";
        
        return $this->_results;
    }
}
