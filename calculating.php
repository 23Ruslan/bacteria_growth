<?php
require_once('FibonacciOOP.php');
$ticksNumber = ($_POST['number']) ? trim( filter_var($_POST['number'], FILTER_SANITIZE_NUMBER_FLOAT )) : 16;
$a = new FibonacciOOP($ticksNumber);
// echo $a->fibonacciNumbersDirectly() . " <br> "; // just for testing and debugging
echo $a->fibonacciNumbersBinet();