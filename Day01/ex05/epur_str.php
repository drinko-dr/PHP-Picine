#!/usr/bin/php
<?php
	if ($argc == 2) {
		$str = array_filter(explode(" ", $argv[1]),"strlen");
		$res = "";
		foreach ($str as $value)
				$res .= $value." ";
		echo trim($res)."\n";
	}
?>