<?php
    $numbers = array(10, 20, 30, 40, 50);

    print $numbers . "<br>";
    print_r($numbers);     //print_r() : 함수 호출로 편하게 배열값을 출력할 수 있다.
    print "<br>";

    array_push($numbers, 60, 100, 200);
    print_r($numbers);
    print "<br>";


?>