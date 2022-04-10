<?php
    //문제1. 구구단 역방향으로 출력하기
    for($dan=9; $dan > 1;$dan--)
    {
        for($i=9; $i > 0; $i--)
        {
            print $dan . "X" . $i . "=" . ($dan * $i) . "<br>";
        }
    }

    //문제2. 랜덤숫자 1~20까지의 숫자를 입력받아 팩토리얼 계산하기
    $num = rand(1, 20);
    $fac = 1;
    for($i=1; $i <= $num; $i++)
    {
        $fac *= $i;
    }
    print $num . "! = " . $fac . "입니다.";

    //문제3. 3의 배수의 합과 5의 배수의 합, 그 합의 모두 더 한 값
    $sum_3 = 0;
    $sum_5 = 0;
    for($i = 1; $i <= 50;$i++)
    {
        if($i % 3 == 0)
        {
            $sum_3 += $i;
        }
        if($i % 5 == 0)
        {
            $sum_5 += $i;
        }
    }

    print "3의 배수 합 : " . $sum_3 . "<br>5의 배수 합 : " . $sum_5 . "<br>그 합의 " . $sum_3 + $sum_5;

    //문제4.오늘의 짝궁
    $member = array("박은지","김재훈","신혜미","남그린","윤정인","이경식","이승재","최우원","허영롱");
    $num1 = rand(0, 8);
    $num2 = rand(0, 8);
    
    while($num1 == $num2)
    {
    $num1 = rand(0, 8);
    $num2 = rand(0, 8);
    }
    print "오늘의 짝꿍 : " . $member[$num1] . ", " . $member[$num2] . "입니다.";

    //문제5.1~100 홀수와 짝수 각각 나열
    print "-- 홀수 --<br>";
    for($i=1;$i<=100;$i++)
    {
        if($i % 2 ==0) {continue;}
        print $i . "<br>";
    }
    print "-- 짝수 --<br>";
    for($i=1;$i<=100;$i++)
    {
        if($i % 2 !=0) {continue;}
        print $i . "<br>";
    }

    //문제6. 1부터 20까지의 숫자를 랜덤으로 출력되게 했을때 홀수는 Left, 짝수는 Right로 출력
    $numder = rand(1, 20);
    print "랜덤 수 : " . $numder . "<br>";
    if($numder % 2 == 0) {
        print "Right";
    }
    else {
        print "Left";
    }
    
    //문제7. 돈쌓기 파라미드 줄의 개수 입력(3 ~ 10)
    //새로운 폴더

    //문제8. 현재 시간이 20시 이전이면 "Have a good day!" 출력 
    $hour = rand(1, 24);
    print "현재 시간은 : " . $hour . "입니다.<br>";
    if($hour <= 20)
    {
        print "Have a good day!";
    }
    else
    {
        print "";
    }



?>
