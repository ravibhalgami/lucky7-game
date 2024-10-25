<?php
class Balance
{
    public function addBalance(int $amount)
    {
        $_SESSION['user_balance'] += $amount;
    }

    public function substractBalance(int $amount)
    {
        $_SESSION['user_balance'] -= $amount;
    }

    public function defaultBalance()
    {
        $_SESSION['user_balance'] = 100;
    }

    public function getBalance()
    {
        return $_SESSION['user_balance'];
    }
}
