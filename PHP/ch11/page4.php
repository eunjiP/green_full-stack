<?php
    session_start();    //세션을 켜주어야지만 받아오고 보낼 수 있음!!
    $a = 10;
    print $_SESSION['g'] . ', ' . $a;   
        //프린트는 변수와 같이 사용할 때 콤마를 사용하니깐 오류 발생
    
    echo $_SESSION['g'] , ', ' , $a;