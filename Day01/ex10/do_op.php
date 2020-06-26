#!/usr/bin/php
<?php
	if ($argc != 4 ){
		echo "Incorrect Parameters\n";
		exit();
	}else{
		$num1 = trim($argv[1]);
		$oper = trim($argv[2]);
		$num2 = trim($argv[3]);
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
	}
?>