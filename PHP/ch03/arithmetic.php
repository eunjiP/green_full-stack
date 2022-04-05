<?php
    $n1 = 8;
    $n2 = 5;

    $result = $n1 + $n2;
    print "$n1 + $n2 = $result <br>";

    $result = $n1 - $n2;
    print "$n1 - $n2 = $result <br>";

    $result = $n1 * $n2;
    print "$n1 * $n2 = $result <br>";

    $result = $n1 / $n2;
    print "$n1 / $n2 = $result <br>";

    $result = $n1 % $n2;    //modulo : 나머지(홀짝구분에 주로 사용)
    print "$n1 % $n2 = $result <br>";

    //결과 변수 없이 바로 산수도 가능
    print "$n1 - $n2 = " . $n1 - $n2;
?>