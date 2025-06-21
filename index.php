<?php

require_once 'autoload.php';

use App\Briqsbank\SavingsAccount;
use App\Briqsbank\CurrentAccount;

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