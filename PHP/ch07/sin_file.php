<?php
    print __FILE__ . "<br>";    //파일이 있는 위치를 알 수 있다!!
    print __LINE__ . "<br>";    //줄의 위치를 알 수 있다
    print "PHP VERSION : " . PHP_VERSION . "<br>";
    print "OS : " . PHP_OS . "<br>";

    $GLOBALS["foo"] = 10;       //파일내에서 전역으로 사용가능한 상수
    $GLOBALS["foo"] = 11;

    print "-- 글로벌 상수 -- <br>";     //php superglobal (슈퍼 글로벌 상수)
    foreach($GLOBALS as $key => $var)
    {
        print $key . " : " . $var . "<br>";
        print_r($var);
        print "<br>";
    }

    $arr = array(
        "name" => "홍길동",
        "age"  => 20,
        "height" => 160.6
    );
    
    foreach($arr as $key => $var)
    {
        print $key . " : ";
        print_r($var);
        print "<br>";
    }

   
?>
