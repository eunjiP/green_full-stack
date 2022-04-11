<?php
    $socre = array(1, 2, 3, 4);
    $socre2 = $socre;   //깊은 복사(새로운 배열을 한개 더 만든다.)

    print_r($socre);
    print "<br>";
    print_r($socre2);
    print "<br>";

    $socre2[0] = 100;   //한개만 수정

    print_r($socre);
    print "<br>";
    print_r($socre2);   //한개만 변경됨(깊은 복사가 이루어진다는 이야기)
    print "<br>";


?>