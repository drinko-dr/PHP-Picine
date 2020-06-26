#!/usr/bin/php
<?php
	if ($argc > 1) {
		$str = array_values(array_filter(explode(" ", $argv[1]), "strlen"));
		$str[] = $str[0];
		unset($str[0]);
		$res = "";
		foreach ($str as $value)
			$res .= $value . " ";
		echo trim($res) . "\n";
	}
?>