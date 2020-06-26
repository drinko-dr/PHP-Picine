<?php
session_start();
if ( !$_SESSION["loggued_on_user"] ){
	echo "ERROR\n";
	exit();
}
if ( file_exists('../private/chat') ) {
	$chat = unserialize(file_get_contents('../private/chat'));

	foreach ($chat as $item) {
			$name = $item["name"];
			$msg = $item["msg"];
			$time = $item["time"];

			echo "[" . date('H:i', $time) . "] <b>" . $name . "</b>: " . $msg . "<br />";
	}

}

?>
