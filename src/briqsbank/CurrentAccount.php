<?php
namespace App\Briqsbank;

class CurrentAccount extends BankAccount {
    private $overdraftLimit;

    // public function __construct($accountNumber, 
    //     $initialBalance, $bank, $overdraftLimit) {
    //     parent::__construct($accountNumber, 
    //     $initialBalance, $bank);
    //     $this->overdraftLimit = $overdraftLimit;
    // }

    public function withdraw($amount) {
        if($amount > ($this->balance + $this->overdraftLimit)) {
            echo "Withdrawal denied: exceeds overdraft limit";
        } else {
            $this->balance -= $amount;
            echo "Withdrew N{$amount}. 
            New Balance: N{$this->balance}";
        }
    }

    public function showDetails() {
        echo "Current Account: {$this->accountNumber} 
        | Balance: N{$this->balance} 
        | Overdraft Limit: N{$this->overdraftLimit}";
    }

    public function createAccount() {
        $stmt = $this->db->prepare("INSERT INTO accounts 
                                  (user_id, account_number, type, balance, interest_rate)
                                  VALUES (?,?,'current', ?,?)");
        $stmt->execute([
            $this->userId, 
            $this->accountNumber, 
            $this->balance, 
            $this->overdraftLimit
        ]);
        echo "Current account {$this->accountNumber} created.";
    }
}