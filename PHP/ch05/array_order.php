<?php
    $arr_age = array(
        "Peter" => 35,
        "Ben" => 37,
        "Joe" => 43,
        "John" => 24,
    );

    //값 정렬
    //sort(오름 차순), rsort(내림차순)

    $copy_arr_1 = $arr_age;
    print "copy : ";
    print_r($copy_arr_1);
    print "<br>";

    rsort($copy_arr_1);      

    print "origin : ";
    print_r($arr_age);
    print "<br>";
    print "copy : ";
    print_r($copy_arr_1);   //값이 정렬 되면서 key가 사라진다.

    print "<br>";
    print "origin : ";
    print_r($arr_age);      //origin은 변하지 않았다.
    print "<br>----------------------------<br>";

    //키 정렬
    //ksort(오름차순), krsort(내림차순)

    $copy_arr_2 = $arr_age;
    print "copy2 : ";
    print_r($copy_arr_2);
    print "<br>";

    krsort($copy_arr_2);

    print "copy2 : ";
    print_r($copy_arr_2);   //key를 정렬하는 거라서 key가 살아있다.
    print "<br>";

?>