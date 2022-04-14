<?php
    function inc()
    {
        //$i = 1               //$i = 1은 함수생성때 마다 초기화 되지만 
        static $i = 1;         //static $i = 1; 한번 생성시 계속 유지되어 값이 누적된다.
        print $i . "<br>";
        $i += 1;
    }

    $z = 1;
    function inc2()
    {
        global $z;
        print $z . "<br>";
        $z += 1;
    }

    for($i = 0; $i<10; $i++)
    {
        inc2();
    }

    $z = 100;           
        //전역 변수로도 static을 대신해서 사용 가능하나,
        //전역 변수를 쓰면 다른데서 값이 변경 될수 있지만 static은 값을 변경하기 힘들다.

?>