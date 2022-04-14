<?php
    $start_num = 1;
    $end_num = 100;

    $result = sum_from_to($start_num, $end_num);    //아규먼트, 인자, 인수(괄호 안의 값)

    print "$start_num ~ $end_num 을(를) 모두 더한 값은 $result 입니다.<br>";

    //문제)함수를 정의하세요
    //내답(답 동일)
    function sum_from_to($num1, $num2)  //파라미터, 매개변수(괄호 안의 값)
    {
        $hap = 0;
        for($i = $num1; $i <= $num2; $i++)
        {
            $hap += $i;
        }
        return $hap;
    }

    
?>