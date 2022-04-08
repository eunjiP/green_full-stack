<?php
    //while미션2의 랜덤변수 선언 한번으로 해결하는 방법
    //do-while : do를 실행 뒤에 while 조건 확인(순서가 다르다)
    //하지만 do-while문은 do를 먼저 실행하기때문에 10이 나올수 밖에 없다.
    print "-- 시작 --<br>";
    do {
        $r_val = rand(1, 10);
        print "r_val : $r_val<br>";
    }
    while($r_val !== 10);
    print "-- 끝 --";

?>
