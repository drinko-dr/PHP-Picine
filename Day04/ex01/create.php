<?php
	if ( $_POST["login"] && $_POST["passwd"] && $_POST["submit"] === "OK" ) {
		$login = $_POST["login"];
		$passwd = $_POST["passwd"];
		if (file_exists("../private") && file_exists("../private/passwd")){
			$log = file_get_contents("../private/passwd");
			$log = unserialize($log);
			if ( !$log[$login] ){
				$passwd = hash("whirlpool", $passwd);
				$log[$login]["passwd"] = $passwd;
				file_put_contents("../private/passwd",serialize($log));
			}else{
				echo "ERROR\n";
				exit();
			}
		}else{
			mkdir("../private");
			$passwd = hash("whirlpool", $passwd);
			$log[$login]["passwd"] = $passwd;
			file_put_contents("../private/passwd",serialize($log));

		}
		echo "OK\n";
		exit();
	}else{
		echo "ERROR\n";
		exit();
	}
	?>