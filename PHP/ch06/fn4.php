<?php
    $dan = rand(2, 9);

    // print_gugudan($dan);
    print_gugudan_from_to(2, 6);

    /* 
    문제1)만약 dan = 2 이면 아래처럼 나오는 함수를 구현하세요

    2 X 1 = 2
    2 X 2 = 4
    ...
    2 X 9 =18

    */

    //내 답(답 동일)
    function print_gugudan($num)
    {
        for($i=1; $i <= 9; $i++)
        {
            print "${num} X $i = " . ($num * $i) . "<br>";
        }
    }

    //문제2) print_gugudan_from_to 함수 구현(2단~6단까지 출력되는 함수)
    // function print_gugudan_from_to($num1, $num2)
    // {
    //     for($i=$num1; $i <= $num2; $i++)
    //     {
    //         print "===== $i 단 =====<br>";
    //         for($j=1; $j <= 9; $j++)
    //         {
    //             print "$i X $j = " . $i * $j . "<br>";
    //         }
    //     }
    // }

    //강사님 답
    function print_gugudan_from_to($num1, $num2)
    {
        for($i=$num1; $i <= $num2; $i++)
        {
            print_gugudan($i);      //재활용성이 높게 구현!!
            print "<br>";
        }
    }

?>