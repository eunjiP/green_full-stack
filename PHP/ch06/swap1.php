<?php
    function swap_val($n1, $n2)
    {
        $temp = $n1;
        $n1 = $n2;
        $n2 = $temp;
    }

    function swap_ref(&$n1, &$n2)
    {
        $temp = $n1;
        $n1 = $n2;
        $n2 = $temp;
    }

    $a = 10;
    $b = 30;

    print "a: $a, b: $b <br>";  //원래 값을 확인 하는 변수
    swap_val($a, $b);           //자리변경 함수($n1, $n2의 자리만 변경한거지 원래값 a,b는 변경안된다.)
    print "a: $a, b: $b <br>";  //원래 값은 변경되지 않는다(참조값 영향없음)
    print "--------<br>";
    print "a: $a, b: $b <br>";  //원래 값을 확인 하는 변수
    swap_ref($a, $b);           //매개변수에 '&'를 붙여서 넣을 경우 원래 값 또한 변경이 일어난다.
    print "a: $a, b: $b <br>";  //원래 값도 변경!!(참조값 영향있음)
?>