<?php
    if(isset($name))    //값이 할당 되어있는지 확인(변수 선언 전이라 실행 안됨)
    {
        print "name is ok!!";
    }
    $name = "HongGilDong";
    if(isset($name))    //변수 선언 후 라서 실행됨
    {
        print "name is great!!";
    }
    print $name . "<br>";

    unset($name);       //변수 해제
    print $name . "<br>";   //빈칸은 br때문이고 아무것도 나오지 않는다.

    print "The End";
?>