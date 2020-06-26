#!/usr/bin/php
<?php
if ($argc != 2)
	exit();

$user = array();
$count = 0;
$total = 0;
$str = fgets(STDIN);
while ($str && !feof(STDIN)) {
	$tmp = explode(";", fgets(STDIN));
	if (count($tmp) == 4 ) {
		if ($argv[1] === "moyenne"){
			if ($tmp[2] !== "moulinette" && $tmp[1] !== '') {
				$count++;
				$total += $tmp[1];
			}
		}
		else if ($argv[1] === "moyenne_user" || $argv[1] === "ecart_moulinette"){
			$user = user_list($user, $tmp);
		}
	}
}

function user_list($user, $tmp){
	if (!array_key_exists($tmp[0], $user)) {
		$user[$tmp[0]] = null;
		$user[$tmp[0]]['total'] = 0;
		$user[$tmp[0]]['count'] = 0;
		$user[$tmp[0]]['moulinette'] = 0;
	}
	if ($tmp[1] !== '' && $tmp[2] !== "moulinette") {
		$user[$tmp[0]]['count'] += 1;
		$user[$tmp[0]]['total'] += $tmp[1];
	} else if ($tmp[2] === "moulinette"){
		$user[$tmp[0]]['moulinette'] = $tmp[1];
	}
	return $user;
}

ksort($user);

if ($argv[1] === "moyenne"){
	echo $total / $count ."\n";
	exit();
}else if ($argv[1] === "moyenne_user" || $argv[1] === "ecart_moulinette") {
		if ($argv[1] === "moyenne_user") {
			foreach ($user as $key => $value) {
				echo $key . ":" . ($value['total'] / $value['count']) . "\n";
			}
		} else {
			foreach ($user as $key => $value) {
				echo $key . ":" . (($value['total'] / $value['count']) - $value['moulinette']) . "\n";
			}
		}
}
?>
