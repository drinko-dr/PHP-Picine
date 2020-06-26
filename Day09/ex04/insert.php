<?php

	if ( isset( $_POST ) ){
		if ( isset( $_POST["list"] ) ){
			$file = file_get_contents("list.csv");
			if (!file_exists("list.csv") || !$file){
				$to_do = $_POST["id"].";".$_POST["list"]."\n";
				file_put_contents("list.csv",$to_do);
			}else{
			    $file = parser($file);
			    add_row($file, $_POST["id"], $_POST["list"]);

			}
		}
	}

	function parser($list){
		$array = [];
		$list = explode("\n", $list);
		foreach ($list as $value){
			if ($value)
				$array[] = [
							"id" => explode(";", $value)[0],
							"todo" => explode(";", $value)[1]
							];
		}

		return $array;
	}

	function encode($array){
		$text = null;
		foreach ($array as $value)
		{
				$text .= $value["id"].";".$value["todo"]."\n";
		}
		return $text;
	}

	function add_row($array, $new_id, $new_todo){
		$last_index = count($array);
		$array[$last_index] = [
									"id" => $new_id,
									"todo" => $new_todo
								];
		$to_do = encode($array);
		file_put_contents("list.csv",$to_do);
	}