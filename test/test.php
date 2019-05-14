<?php

echo "\n";
echo "\n";
//Upon Successful Connection Providing Policy#ID For Error Verification.
echo " Case I : Information For Bad Policy#ID: 1234567";
echo "\n";
$argv[1] = 1234567;
include 'main2.php';

echo "\n";
//Upon Successful Connection Providing Policy Information For Individual With Policy#: IU59367.
echo " Case II : Information For Bad Individual Policy#ID: IU59367";
echo "\n";
echo "\n";
$argv[1] = IU59367;
include 'main2.php';
echo "\n";
echo "\n";

echo "\n";
echo "\n";
//Upon Successful Connection Providing Policy Information For Business With Policy#: "JF80331".
echo " Case III : Information For Good Business Policy#ID: JF80331";
echo "\n";
echo "\n";
$argv[1] = JF80331;
include 'main2.php';
echo "\n";
echo "\n";

echo "\n";
echo "\n";
//Upon Successful Connection Providing Policy Information For Bad Business With Phone#: 1234567890.
echo " Case IV : Information For Bad Business Policy With Phone#: 1234567890";
echo "\n";
echo "\n";
$argv[1] = 1234567890;
include 'phone.php';
echo "\n";
echo "\n";

echo "\n";
echo "\n";
//Upon Successful Connection Providing Policy Information For Good Business With Phone#: 4435292128.
echo " Case V : Information For Good Business Policy With Phone#: 4435292128";
echo "\n";
echo "\n";
$argv[1] = 4435292128;
include 'phone.php';
echo "\n";
echo "\n";

echo "\n";
echo "\n";
//Upon Successful Connection Providing Policy Information For Good Business With Phone#: NULL.
echo " Case VI : Information For Good Business Policy With Phone#: NULL";
echo "\n";
echo "\n";
$argv[1] = null;
include 'phone.php';
echo "\n";
echo "\n";



?>