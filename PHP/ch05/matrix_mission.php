<?php
    
    $scores = array (
        //    국어,영어,수학
        array(100, 100, 100),   //영수
        array(90, 80, 70),      //순자
        array(55, 65, 75),      //영철
        array(90, 88, 55),      //옥순-값을 추가하더라도 유연하게 대응된다.
        array(100, 90, 80)
    );

    //사람별 총합점 구하기
    $names = array("영수", "순자", "영철", "옥순", "철수");
    $each_scores = array(0, 0, 0);
    print "-- 합계 --<br>";
    for($i = 0; $i<count($scores); $i++)    //0~4
    {
        for($j = 0; $j <count($scores[$i]);$j++)    //0~2
        {
             $each_scores[$i] += $scores[$i][$j];
        }
    }

    for($a=0; $a < count($names); $a++)
    {
        print $names[$a] . " : " . $each_scores[$a] . "<br>";
    }
    //사람별 평균구하기
    print "-- 평균 --<br>";
    $each_avg = array(0, 0, 0);
    for($i=0; $i < count($names); $i++)
    {
        $each_avg[$i] = $each_scores[$i] / count($scores[$i]);
    }

    for($a=0; $a < count($names); $a++)
    {
        print $names[$a] . " : " . $each_avg[$a] . "<br>";
    }

    //과목별 총합과 평균
    print "-- 과목 합계 --<br>";
    $name = array("국어", "영어", "수학");
    $each_scores = array(0, 0, 0);
    //과목별 합계
    for($i=0; $i < count($scores[$i]); $i++)
    {
        for($j=0; $j < count($scores); $j++)
        {
            $each_scores[$i] += $scores[$j][$i];
        }
    }
    //합계 출력
    for($a=0; $a < count($name); $a++)
    {
        print $name[$a] . " : " . $each_scores[$a] . "<br>";
    }
    print "-- 과목 평균 --<br>";
    //과목별 평균
    for($a=0; $a < count($name); $a++)
    {
        print $name[$a] . " : " . $each_scores[$a] / count($names) . "<br>";
    }


?>