<?php
    /* 
    문제) 배열안에 있는 합계와 평균을 구하세요
        합계 : 375
        평균 : 75
    */

    $score_arr = array(100, 90, 33, 87, 65);
    $sum = 0;
    
    for($i = 0; $i < count($score_arr); $i++)
    {
        $sum += $score_arr[$i];
    }

    $avg = $sum/count($score_arr);

    print "합계 : $sum<br> 평균 : $avg";


?>