<?php
    $x = 10;    //전역으로 사용가능하다

    foreach($GLOBALS as $key => $var)
    {
        print $key . " : " . $var . "<br>";
        print_r($var);
        print "<br>";
    }

?>