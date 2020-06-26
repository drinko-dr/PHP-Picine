<?php
session_start();
 if ( !$_SESSION["loggued_on_user"] ){
 	echo "ERROR\n";
 	exit();
 }else
 	echo $_SESSION["loggued_on_user"]."\n";
?>
