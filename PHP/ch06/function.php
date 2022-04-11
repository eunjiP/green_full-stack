<?php
    //객체 안에 함수가 있으면 method(메소드)라고 부른다.

    //객체 안이 아니라면 function(함수)라고 부른다.
    //함수 function

//형식 : function 함수명(매개변수) {}   => 함수 정의
//총 4가지 형태가 가능(매개 변수가 있고 없고, 반환 값이 있고 없고)
    function sum($n1, $n2)  //괄호 안 : 파라미터, 매개 변수
    {
        return $n1 + $n2;   //return 반환하고 싶은 값
    }

    function minus($n1, $n2)  
    {
        print "minus : " . ($n1 - $n2) . "<br>";   
    }


    $result = sum(10, 11);  //=> 함수 호출

    print "result : $result <br>";
    print "result : " . sum(30, 40) . "<br>";   //반환값이 있는게 조금도 유연하다(2차가공이 쉽다)


    minus(35, 12);      //2차가공이 까다롭다.(호출만 해도 바로 출력이 되므로)
    minus(10, 2);

?>