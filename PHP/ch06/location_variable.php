<?php
    function make_ten()
    {
        $a = 10;            //지역 변수
        global $i;          //지금 선언하는거는 전역변수를 변경하겠다라는 말
        $i = $i + 10;       
        
    }

    $i = 5;                 //전역 변수
    make_ten();
    print "i : $i <br>";

?>