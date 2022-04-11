<?php
    //이 배열은 순서와는 상관없는 배열-시퀀스(순서)가 없는 배열
    $freshman = array(
        //키    => 값
        "David" => "Computer",
        "Alice" => "Math",
        "Elsa"  => "Physics",
        "Bob"   => "Music",
        "Chris" => "Electronics"
    );

    print_r($freshman);

    print "<br><br>";
    print $freshman["David"] . "<br>";
    print $freshman["Alice"] . "<br>";
    print $freshman["Elsa"] . "<br>";
    print $freshman["Bob"] . "<br>";
    print $freshman["Chris"] . "<br>";

    $freshman["Bob"] = "Dance";         //배열 값 수정
    print "<br><br>";
    print $freshman["Bob"] . "<br>";    //수정 확인

    $freshman["Frank"] = "History";     //배열 값 추가
    print $freshman["Frank"] . "<br>";

    $freshman[0] = "안녕";
    $freshman["0"] = "Hello";   //동일한 결과
    print "<br><br>";
    print_r($freshman);

?>