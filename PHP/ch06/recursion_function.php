<?php
    //재귀함수 : 내가 함수라면 내가 나를 호출하는 것.

    //문제)factorial 구현하는 함수를 만드세요
    function factorial($n) 
    {
        $fac = 1;
        for($i = $n; $i > 0; $i--)
        {
            $fac *= $i;
        }
        return $fac;
    }
    function factorial_rec($num)
    {
        if($num === 1) { return 1; }
        return $num * factorial_rec($num - 1);
    }

    $num = 3;
    $result = factorial_rec($num); //3 x 2 x 1
    print "${num}!= $result <br>";

    //문제) 절대값 만들기
    function my_abs($num)
    {
        if($num < 0)
        {
            $num *= -1;
            return $num;        //return -$num; 두줄을 한줄로 표현가능
        }
        return $num;            //return $num < 0? -$num : $num;  삼항식 표현
    }

    print "my_abs(-3) : " . my_abs(-3) . "<br>";    //3이 출력되는지 확인
    print "my_abs(3) : " . my_abs(3) . "<br>";    //3이 출력되는지 확인
?>