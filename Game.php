<?php
class Game
{

    protected Balance $balance;
    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function rollDice(): int
    {
        return rand(1, 6);
    }

    public function result($total, $bet_option)
    {
        if ($bet_option === 'below_7' && $total < 7) {
            $this->balance->addBalance(20);
            return true;
        } else if ($bet_option === 'above_7' && $total > 7) {
            $this->balance->addBalance(20);
            return true;
        } else if ($bet_option === 'same' && $total === 7) {
            $this->balance->addBalance(30);
            return true;
        }

        return false;
    }

    public function substractBalance($amount)
    {
        $this->balance->substractBalance($amount);
    }

    public function setDefaultBalance()
    {
        $this->balance->defaultBalance();
    }
}
