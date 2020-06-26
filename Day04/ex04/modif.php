<?php
if ( $_POST["login"] && $_POST["oldpw"] && $_POST["newpw"] && $_POST["submit"] === "OK" ) {
	$login = $_POST["login"];
	$old_passwd = $_POST["oldpw"];
	$new_passwd = $_POST["newpw"];
	$log = file_get_contents("../private/passwd");
	$log = unserialize($log);
	if ( $log[$login] && $log[$login]["passwd"] === hash("whirlpool",$old_passwd ) ){
		$log[$login]["passwd"] = hash("whirlpool",$new_passwd);
		file_put_contents("../private/passwd",serialize($log));
	}else{
		echo "ERROR\n";
		exit();
	}
	header('Location: index.html');
	echo "OK\n";
	exit();
}
	echo "ERROR\n";
	exit();