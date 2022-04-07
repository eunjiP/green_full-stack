<?php
    // 배열 수업
    $week = array("일", "월", "화", "수", "목", "금", "토");

    $weekend = array($week[6], $week[0]);

    print $weekend[0] . "," . $weekend[1] . "<br>";

    print $week[0] . "<br>";
    print $week[3] . "<br>";

    $week[3] = "wed";           //배열 값 수정
    print $week[3] . "<br>";

    $week[7] = "응?"; 
    print $week[7] . "<br>";    //배열이 정적이지 않고 동적이다. 

    //array_push(배열명, 추가할 값-여러개라면 콤마사용해서 순차적으로 추가가능)
    array_push($week, "C");     //가장 마지막 인덱스에 값 추가하는 방법(지정하게되면 빈칸 생길 수 있음)
    print $week[8] . "<br>";    
    print $week[9] . "<br>";    //없는 곳은 빈칸 출력

    print "count(\$week) : " . count($week) . "<br>";
    //길이는 배열에 값이 있는 갯수까지만 취급한다(빈칸은 count안함)
    //"count(\$week) : " : 역슬래시는 문자열안에서 변수 취급이 되지않도록 무력화 시켜준다

    print "=====================<br>";
    //PHP는 배열에 타입 구분없이 들어가지만 좋은 습관이 아니므로 되도록 타입은 통일 시켜주는 것이 좋다.
    $test = array(1, 3.44, "안녕");
    print $test[0];
    print $test[1];
    print $test[2];
    

?>
