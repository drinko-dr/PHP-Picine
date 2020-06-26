<?php
function ft_split($str){
	$res = array_filter(explode(" ", $str),"strlen");
	sort($res);
	return ($res);
}
?>