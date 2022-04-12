<?php
    //문제) 함수를 호출했을때 정상적으로 작동할수 있는 함수 정의하기
    $n1 = 9;
    $n2 = 5;

    print_sum($n1, $n2);
    print_minus($n1, $n2);
    print_multi($n1, $n2);
    print_div($n1, $n2);
    print_mod($n1, $n2);

    //되도록이면 변수명이 중복안되도록 설정해주기!
    function print_sum($num1, $num2)
    {
        print "$num1 + $num2 = " . $num1 + $num2 . "<br>";
    }

    function print_minus($num1, $num2)
    {
        print "$num1 - $num2 = " . $num1 - $num2 . "<br>";
    }

    function print_multi($num1, $num2)
    {
        print "$num1 * $num2 = " . $num1 * $num2 . "<br>";
    }

    function print_div($num1, $num2)
    {
        print "$num1 / $num2 = " . $num1 / $num2 . "<br>";
    }

    function print_mod($num1, $num2)
    {
        print "$num1 % $num2 = " . $num1 % $num2 . "<br>";
    }

    //강사님 답
    // function print_result($num1, $symbol, $num2, $result)   //출력함수를 따로 만들어서 매개변수로 전달
    // {
    //     print "$num1 $symbol $num2 = $result <br>";
    // }
    // function print_sum($num1, $num2)        
    // {
    //     $result = $num1 + $num2;
    //     print_result($num1, "+", $num2, $result);
    // }
    // function print_minus($num1, $num2) 
    // {
    //     print_result($num1, "-", $num2, ($num1 - $num2));
    // }
    // function print_multi($num1, $num2) 
    // {
    //     print_result($num1, "*", $num2, ($num1 * $num2));
    // }
    // function print_div($num1, $num2) 
    // {
    //     print_result($num1, "/", $num2, ($num1 / $num2));
    // }
    // function print_mod($num1, $num2) 
    // {
    //     print_result($num1, "%", $num2, ($num1 % $num2));
    // }
?>