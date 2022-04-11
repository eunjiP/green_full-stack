<?php
    $arr = [10, 33, 12, 8, 1, 89];

    print_r($arr);
    print "<br>";

    // 10, 33 과 자리 변경원한다.
    $temp = $arr[0];
    $arr[0] = $arr[1];
    $arr[1] = $temp;

    print_r($arr);
    print "<br>";
?>