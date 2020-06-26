<?php
    if ( isset($_POST) && isset($_POST["id"]) ){
		$file = file_get_contents("list.csv");

		$file = parser($file);

		foreach ($file as $key => $value){
			if ($value['id'] == $_POST["id"])
				$file[$key] = null;
		}

		$to_do = encode($file);
		file_put_contents("list.csv",$to_do);

	}
function parser($list){
	$array = [];
	$list = explode("\n", $list);
	foreach ($list as $key => $value){
		if ($value) {
			$array[] = [
				"id" => explode(";", $value)[0],
				"todo" => explode(";", $value)[1]
			];
		}
	}

	return $array;
}

function encode($array){
	$text = null;
	foreach ($array as $value)
	{
		if ($value)
			$text .= $value["id"].";".$value["todo"]."\n";
	}
	return $text;
}
