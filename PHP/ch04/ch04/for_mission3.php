<?php
    //문제)for문을 활용하셔서 1~100을 더한 값을 구하시오.
    $hap = 0;
    for($i = 1; $i <= 100; $i++)
    {
        $hap += $i;
    }
    print "<div>1 ~ 100까지의 합 : $hap</div>";

    //자발적 연습)for문을 활용해서 1~100사이의 짝수의 합과 홀수의 합을 각각 구해보자
    $result_even = 0;
    $result_odd = 0;
    for($i = 1; $i <= 100; $i++)
    {
        if($i % 2 == 0)
        {
            $result_even += $i;
        }
        else
        {
            $result_odd += $i;
        }
    }
    print "<div>짝수의 합 : $result_even </div>";
    print "<div>홀수의 합 : $result_odd </div>";

?>