#!/usr/bin/php
<?php
	function cmp($a, $b)
	{
		$line = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
		$i = 0;

		while ($i < strlen($a) || $i < strlen($b))
		{
				$a_i = stripos($line, $a[$i]);
				$b_i = stripos($line, $b[$i]);

			if ($a_i < $b_i)
				return -1;
			else if ($a_i > $b_i)
				return +1;

			$i++;
		}
		if (strlen($a) > strlen($b))
			return 1;
		else if (strlen($a) < strlen($b))
			return -1;
	}
	if ($argc > 1){
		unset($argv[0]);
		$array = null;
		foreach ($argv as $value) {
			$temp = array_filter(explode(" ", $value), "strlen");
			foreach ($temp as $val)
				$array[] = $val;
		}
		usort($array, "cmp");
		foreach ($array as $val){
			echo $val."\n";
		}
	}
	?>