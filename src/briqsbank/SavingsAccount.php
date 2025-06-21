<?php

namespace App\Briqsbank;

class SavingsAccount extends BankAccount {
    private $interestRate;

    public function __construct($accountNumber, $initialBalance, $bank, $interestRate) {
        parent::__construct($accountNumber, $initialBalance, $bank);
        $this->interestRate = $interestRate;
    }

    public function applyInterest() {
        $interest = $this->balance * $this->interestRate;
        $this->balance += $interest;
        echo "Interest applied: N{$interest}. 
        New Balance: N{$this->balance}.";
    }

    public function showDetails() {
        echo "Savings Account: {$this->accountNumber} 
        | Balance: N{$this->balance} 
        | Interest: N{$this->interestRate}";
    }
}