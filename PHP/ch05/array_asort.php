<?php
    $arr_age = array(
        "Peter" => 35,
        "Ben" => 37,
        "Joe" => 43,
        "John" => 24,
    );

    //값 정렬 (키값 유지)
    //asort(오름 차순), arsort(내림차순)
    
    arsort($arr_age);

    print_r($arr_age);
?>