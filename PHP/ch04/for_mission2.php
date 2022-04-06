<?php
    //문제)2~9 사이의 랜덤 숫자 dan으로 구구단을 구현하세요
    $dan = rand(2, 9);

    for($i = 1;$i <= 9; $i++)
    {
        print "<div>$dan X $i = ". $dan * $i . "</div>";
    }

    //자발적 연습)이중 for문으로 구구단 전체 출력하기(단정보와 단사이의 구분 포함)
    for($dan1 = 2;$dan1 <= 9; $dan1++)
    {
        print "======= $dan1 단 ==========";
        for($i = 1;$i <= 9; $i++)
        {
            print "<div>$dan1 X $i = ". $dan1 * $i . "</div>";
        }
        print "<br>";
    }


?>
