#!/usr/bin/php
<?php
	if ($argc != 2){
		echo "Incorrect Parameters\n";
		exit();
	}
	$argv[1] = str_replace(" ", "",$argv[1]);

	if (($index = strpos($argv[1], "/")) ||
		($index = strpos($argv[1], "+")) ||
		($index = strpos($argv[1], "-")) ||
		($index = strpos($argv[1], "*") )||
		($index = strpos($argv[1], "%")))
	{
		$temp = explode($argv[1][$index], $argv[1]);
		if (count($temp) > 2){
			echo "Syntax Error\n";
			exit();
		}
		$num1 = $temp[0];
		$oper = $argv[1][$index];
		$num2 = $temp[1];

	}else{
		echo "Syntax Error\n";
		exit();
	}

	if (!is_numeric($num1) || !is_numeric($num2)){
		echo "Syntax Error\n";
		exit();
	}
	if ($oper == "+")
		echo $num1 + $num2 . "\n";
	else if ($oper == "-")
		echo $num1 - $num2 . "\n";
	else if ($oper == "/")
		echo $num1 / $num2 . "\n";
	else if ($oper == "*")
		echo $num1 * $num2 . "\n";
	else if ($oper == "%")
		echo $num1 % $num2 . "\n";
	else
		echo "Syntax Error\n";
	?>