#!/usr/bin/php
<?php
	unset($argv[0]);
	if ($argc > 1){
		foreach ($argv as $value) {
			$temp = array_filter(explode(" ", $value),"strlen");
			foreach ($temp as $val)
				$array[] = $val;
		}
		sort($array);
		foreach ($array as $val){
			echo $val."\n";
		}
	}
?>