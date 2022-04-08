<?php
    print "----------- break -----------<br>";
    for($i=0; $i<20; $i++)
    {
        print $i . "<br>";

        if($i == 12) {break;}   //12 되자 마자 바로 중단
    }

    print "----------- continue -----------<br>";
    for($i=0; $i<20; $i++)
    {
        if($i == 12) {continue;}    //12를 건너뛰고 그 이후의 값은 진행된다.(==skip)
        print $i . "<br>";          //쉽게 continue의 이전 실행문은 실행이 안된다.
    }
?>