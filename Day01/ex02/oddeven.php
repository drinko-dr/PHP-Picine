#!/usr/bin/php
<?php
while(1){
	echo "Enter a number: ";
	$s = fgets(STDIN);
	$s = trim($s);
	if (feof(STDIN)){
		echo "\n";
		exit();
	}
	if (is_numeric($s)){
		if ($s % 2 == 0)
			echo "The number ". $s . " is even\n";
		else
			echo "The number ". $s . " is odd\n";
	}else
		echo "'".$s."' is not a number\n";
}
?>