<?php
    $seoul = getdate();     //처음 셋팅한 지역의 시간을 배열로 저장

    print "현재 시간 : " . 
        $seoul["year"] . "년 " .        
        $seoul["mon"] . "월 " . 
        $seoul["mday"] . "일 " . 
        $seoul["hours"] . "시 " . 
        $seoul["minutes"] . "분 " . 
        $seoul["seconds"] . "초";   //배열로 저장된거라 키값으로 호출한다
    
    print "<br>-----------------<br>";

    $year = gmdate("Y");    //표준시간
    $mon = gmdate("m");
    $day = gmdate("d");
    $hour = gmdate("G");
    $min = gmdate("i");
    $sec = gmdate("s");

    print "현재 시간 ${year}년 ${mon}월 ${day}일 ${hour}:${min}:${sec} <br>";

    print rand(1, 20);
    
?>