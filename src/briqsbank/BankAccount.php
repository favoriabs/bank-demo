<?php
namespace App\Briqsbank;

use App\Briqsbank\Database\DB;
use PDO;

class BankAccount {
    protected $db;
    protected $userId;
    protected $accountNumber;
    protected $balance;
    protected $bank;
    protected $type;

    public function __construct(int $userId) {
        $this->db = DB::getInstance()->getConnection();
        $this->userId = $userId;
        $this->accountNumber = $this->generateAccountNumber();
        $this->balance = 0;
        $this->bank = "GTB";
    }

    public function deposit($amount) {
        $this->balance += $amount;
        $this->updateBalance();
        echo "Deposited N{$amount}. New Balance: N{$this->balance}.\n";
    }

    public function withdraw($amount) {
        if($amount > $this->balance) {
            echo "Insufficient funds.";
        } else {
            $this->balance -= $amount;
            $this->updateBalance();
            echo "Withdrew N{$amount}. New Balance: N{$this->balance}.\n";
        }
    }

    public function getBalance() {
        return $this->balance;
    }

    public function showDetails() {
        echo "Account: {$this->accountNumber} | Balance: N{$this->balance}\n";
    }

    private function generateAccountNumber(): string {
        return (string) rand(10000000, 999999999);
    }

    protected function updateBalance() {
        $statement = $this->db->prepare("UPDATE accounts SET balance = ? WHERE account_number = ?");
        $statement->execute([$this->balance, $this->accountNumber]);
    }


}