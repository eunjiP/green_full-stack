<?php
    
    $scores = array (
        //    국어,영어,수학
        array(100, 100, 100),   //영수
        array(90, 80, 70),      //순자
        array(55, 65, 75)       //영철
    );

    //각각 사람별 총합점과 평균점수
    $names = array("영수", "순자", "영철");
    $each_scores = array(0, 0, 0);
    print "-- 합계 --<br>";
    //scores배열에서 이름별 총합계를 구해서 each_scores에 담는다.
    for($a=0; $a < count($scores); $a++)
    {
        for($b=0; $b < count($scores[$a]); $b++)
        {
            $each_scores[$a] += $scores[$a][$b];
        }
    }
    //each_scores를 for문을 이용해서 출력해준다.
    for($i=0; $i < count($names); $i++)
    {
        print $names[$i] . " : " . $each_scores[$i] . "<br>";
    }


?>