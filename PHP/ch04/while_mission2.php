<?php
    /* 
    rand(1, 10)실행을 시킬건데 10이 나올때까지 반복한다
    10이 아니면 숫자를 찍는다
    10이 나오면 반복을 멈추고 "끝" 출력!
    */

    $r_val = rand(1, 10);

    print "-- 시작 --<br>";

    while($r_val !== 10)
    {
        print "r_val : $r_val<br>";
        $r_val = rand(1, 10);           //이 문제의 포인트!!(이게 없으면 무한 반복이 된다.)
    }

    print "-- 끝 --";


    //다른 풀이
    print "-- 시작 --<br>";
    while(true) {
        $r_val = rand(1, 10);
        if($r_val == 10) {break;}
        print "r_val : $r_val<br>";
    }
    print "-- 끝 --";
?>