<?php
    /*
    국어
    합계: ?, 평균: ?

    영어
    합계: ?, 평균: ?

    수학
    합계: ?, 평균: ?

    */

 $scores = array (
    //    국어,영어,수학
    array(100, 100, 100),   //영수
    array(90, 80, 70),      //순자
    array(55, 65, 75),      //영철
    array(90, 88, 55),      //옥순
);

$name = array("국어", "영어", "수학");
$sum = array(0, 0, 0);
$avg = array(0, 0, 0);

for($i=0; $i<count($name);$i++)
{
    for($j=0; $j<count($scores);$j++)
    {
        $sum[$i] += $scores[$j][$i];
    }
    $avg[$i] = $sum[$i] / count($scores); 
}

for ($a = 0; $a < count($name); $a++)
{
    print $name[$a] . "<br>합계 : " . $sum[$a] . ", 평균 : " . $avg[$a] . "<br>";
}


?>
