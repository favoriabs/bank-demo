<?php

require_once 'src/BankAccount.php';
require_once 'src/SavingsAccount.php';
require_once 'src/CurrentAccount.php';

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