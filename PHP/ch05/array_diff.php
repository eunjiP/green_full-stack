<?php
    //array_diff 배열 중 다른 값만 출력
    $arr1 = [1, 2, 3];
    $arr2 = [1, 2, 3, 4, 5];

    $arr3 = [1, 2, 3];

    //첫번째 인자인 arr1기준으로 다른 것만 출력
    $diff_arr = array_diff($arr1, $arr2);

    print_r($diff_arr);
    print "<br>";

    //첫번째 인자인 arr2기준으로 다른 것만 출력
    $diff_arr2 = array_diff($arr2, $arr1);
    print_r($diff_arr2);
    print "<br>";

    //배열이 값이 같은지 확인
    print ($arr1 === $arr2) . "<br>";
    print ($arr1 === $arr3) . "<br>";
?>