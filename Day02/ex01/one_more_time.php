#!/usr/bin/php
<?php
if ($argc == 2){
	date_default_timezone_set('Europe/Paris');
	$dayWeekFR = array(
                    1 => "lundi",
                    2 => "mardi",
                    3 => "mercredi",
                    4 => "jeudi",
                    5 => "vendredi",
                    6 => "samedi",
                    7 => "dimanche"
            );
    $monthFR = array(
                    1 => "janvier",
                    2 => "fevrier",
                    3 => "mars",
                    4 => "avril",
                    5 => "mai",
                    6 => "juin",
                    7 => "juillet",
                    8 => "aout",
                    9 => "septembre",
                    10 => "octobre",
                    11 => "novembre",
                    12 => "decembre"
            );
    $date = explode(" ", $argv[1]);
    function isLeap($y){return $y % 400 == 1 || ($y % 100 != 0 && ($y & 3) == 0);}
    if (count($date) < 5) {
		echo "Wrong Format\n";
		exit (-1);
	}

    if ( ( $key = array_search ( lcfirst( $date[0] ), $dayWeekFR ) ) ){
        $dayWeek = $key;
    }else {
        echo "Wrong Format\n";
        exit (-1);
    }
    if (preg_match ( "/^(0[1-9]|[1-9]|[12]\d|3[01])$/" ,$date[1] ) )
        $dayNum = $date[1];
    else {
        echo "Wrong Format\n";
        exit (-1);
    }
    if ( ($key = array_search ( lcfirst( $date[2] ), $monthFR ) ) ){
        $month = $key;
        if ($key % 2 != 0 && $dayNum > 30){
            echo "Wrong Format\n";
            exit (-1);
        }
    }else {
        echo "Wrong Format\n";
        exit (-1);
    }
    if ( $date[3] >= 1970 && strlen($date[3]) == 4){
        if ( $month == 2 && !isLeap($date[3] ) && $dayNum > 28 ){
            echo "Wrong Format\n";
            exit (-1);
        }
    }else{
        echo "Wrong Format\n";
        exit (-1);
    }
    $time = explode(":", $date[4]);
    if (count($time) == 3 && $time[2] != null) {
		if ($time[0] >= 0 && $time[0] < 24 && $time[1] >= 0 && $time[1] < 60 && $time[2] >= 0 && $time[2] < 60) {
			echo mktime($time[0], $time[1], $time[2], $month, $dayNum, $date[3]) . "\n";
			exit();
		}
	}
		echo "Wrong Format\n";
		exit (-1);
}
?>