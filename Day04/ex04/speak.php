<?php
session_start();
if ( !$_SESSION['loggued_on_user'] ){
	echo "ERROR\n";
	exit();
}else{
	if ( $_POST["msg"] ){
		$temp["name"] = $_SESSION["loggued_on_user"];
		$temp["msg"] = $_POST["msg"];
        $temp["time"] = time();
		$chat[] = $temp;
		if ( file_exists("../private/chat") ){

			$chat = unserialize(file_get_contents("../private/chat"));
			$file = fopen("../private/chat", "w");
//			flock($file, LOCK_EX);
			$chat[] = $temp;
			file_put_contents("../private/chat",serialize($chat));
			fclose($file);

		}else{
			file_put_contents("../private/chat",serialize($chat));
		}
	}
	?>
	<html>
        <head>
            <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
        </head>
        <body>
            <form action="speak.php" method="POST">
                <input type="text" name="msg" value=""/>
				<input type="submit" name="submit" value="Send"/>
            </form>
        </body>
	</html>
<?php
}
?>