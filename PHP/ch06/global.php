<?php
    //문제) 소스 수정없이 counts함수 구현하기

    function counts() {
        global $i;
        $i++;
    }

    $i = 0;
    while ($i < 10) {
        counts();   //전역변수 $i값을 1씩 증가 시키는 함수
        print $i . "<br>";
    }

    
?>