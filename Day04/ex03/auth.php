<?php
function auth($login, $passwd){
	if (!$login || !$passwd)
		return false;
	$log = unserialize(file_get_contents("../private/passwd"));
	if ($log[$login] && $log[$login]["passwd"] == hash("whirlpool", $passwd))
		return true;
	return false;
}
?>