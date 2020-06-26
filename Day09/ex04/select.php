<?php
    if ( isset($_POST) ){
        if ( isset($_POST['select']) && $_POST['select'] == "true"){
        	if ( file_exists("list.csv") ) {
				$file = file_get_contents("list.csv");
				if (!$file)
					echo "null";
				else
					echo $file;
			}else
				file_put_contents("list.csv", null);
		}
    }

function parser($list){
	$text = '';
	$list = explode("\n", $list);
	foreach ($list as $value){
		if ($value)
			$text .= explode(";", $value)[1].";";
	}
	return $text;
}