<?php

require_once 'autoload.php';

use App\Briqsbank\SavingsAccount;
use App\Briqsbank\CurrentAccount;
use App\Briqsbank\Database\DB;
use App\Briqsbank\User;

// $db = new DB();
// $db = DB::getInstance()->getConnection();
// $db2 = DB::getInstance()->getConnection();
// $stmt = $db->query("SELECT NOW()");
// echo "Connected. Server time: " . $stmt->fetchColumn() . "\n";

// die();

$user = new User();
$userId = $user->register("Christian Ajewole", "christian@gmail.com");

echo ("user successfully registered");

$savings = new SavingsAccount($userId);
$savings->createAccount();
$savings->deposit(10000);
$savings->withdraw(1500);

$current = new CurrentAccount($userId);
$current->createAccount();
$current->deposit(50000);
$current->withdraw(3000);

die();

$accountOne = new SavingsAccount("0114116070", "GTB", 
                                100000, 0.05);
$accountTwo = new CurrentAccount("0229339139", "Access Bank",
                                 5000, 2000);

$accountOne->deposit(2000);
echo "<br>";
$accountOne->applyInterest();
echo "<br>";
$accountOne->showDetails();

echo "<br>";

$accountTwo->withdraw(6000);
echo "<br>";
$accountTwo->withdraw(2000);
echo "<br>";
$accountTwo->deposit(3000);
echo "<br>";
$accountTwo->showDetails();