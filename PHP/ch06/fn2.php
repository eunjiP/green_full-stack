<?php
    $num = rand(1, 10);

    print_odd_even($num);

    //문제)숫자 10(는)은 짝수입니다. / 숫자 1(는)은 홀수입니다.가 출력되도록 함수 정의
    //내 답1
    // function print_result($number, $result)
    // {
    //     print "숫자 ${number}(는)은 ${result}입니다.<br>";
    // }

    // function print_odd_even($number)
    // {
    //     if($number % 2 == 0)
    //     {
    //         print_result($number, "짝수");
    //     }
    //     else
    //     {
    //         print_result($number, "홀수");
    //     }
    // }

    //내 답2
    // function print_odd_even($number)
    // {
    //     if($number % 2 == 0)
    //     {
    //         print "숫자 ${number}(는)은 짝수입니다.";
    //     }
    //     else
    //     {
    //         print "숫자 ${number}(는)은 홀수입니다.";
    //     }
    // }

    //강사님답
    function print_odd_even($number)
    {
        $result = $number % 2 === 0 ? "짝" : "홀";          //삼항식 사용
        print "숫자 ${number}(는)은 ${result}수입니다.";
    }

?>