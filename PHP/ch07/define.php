<?php
    //define : 상수 정의 함수
    define("NAME" , "홍길동");  //상수(상수를 표시하기 위해 대문자로 표시하는 경우가 많음)
    define("NAME" , "장보고");  //상수는 한번 정의하면 변경이 안된다
    define("NAME2" , "장보고");
    define("STAND_AGE", 25);    //리터럴 : 25 / 상수 : STAND_AGE

    //상수 const vs 리터럴 literal
    //상수 : 변하지 않는 변수
    //리터럴 : 변수에 넣은 변하지 않는 데이터를 의미

    print NAME . "<br>";
    print NAME2 . "<br>";
    print STAND_AGE;
    print "---------------<br>";

    function fn1() 
    {
        print "fn1 : " . NAME . "<br>";
    }

    function fn2()
    {
        define("TEST" , "테스트");
    }
    fn1();
    fn2();  //호출만 되면 전역으로 사용가능 (호출하지 않으면 존재x)
    print TEST . "<br>";
?> 