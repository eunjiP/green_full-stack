<?php
    //case1
    $snum = 5;
    $enum = 10;
    print_num_from_to($snum, $enum);

    //문제) [4, 5, 6, 7, 8, 9, 10] 이렇게 출력하게 해주세요.
    //만약 enum값이 더 작으면 [5, 4, 3, 2, 1] 이 출력되게 해주세요
    //내 답
    // function print_num_from_to($num1, $num2)
    // {
    //     print "[";
    //     if($num1 > $num2) 
    //     {
    //         for($i = $num1; $i >= $num2; $i--)
    //         {
    //             print "$i";
    //             if($i !== $num2)
    //             {
    //                 print ", ";
    //             }
    //         }
    //     }      
    //     else 
    //     {
    //         for($i = $num1; $i <= $num2; $i++)
    //         {
    //             print "$i";
    //             if($i !== $num2)
    //             {
    //                 print ", ";
    //             }
    //         }
    //     }
    //     print "]<br>"; 
    // }

    //강사님 답 - 삼항식을 이용한 간단한 표현방식
    function print_num_from_to($num1, $num2)
    {
        print "[";
        for($i=$num1; $num1 < $num2 ? $i <= $num2 : $i >= $num2; $num1 < $num2 ? $i++ : $i--)
        {
            print $i;
            if($i !== $num2) { print ", "; }
        }
        print "]<br>"; 
    }   
?>