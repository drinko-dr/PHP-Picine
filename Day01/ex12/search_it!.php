#!/usr/bin/php
<?php
	if ($argc < 3) {
		exit();
	}
    $key = $argv[1];
	unset($argv[0], $argv[1]);
	$argv = array_reverse($argv);
    foreach ($argv as $value){
    	$array = explode(":",$value);
    	if ($array[0] === $key){
    		echo $array[1]."\n";
    		exit();
		}
	}
    ?>