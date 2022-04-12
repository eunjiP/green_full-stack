<?php
    //case1
    $snum = 4;
    $enum = 10;
    print_num_from_to($snum, $enum);

    //문제) [4, 5, 6, 7, 8, 9, 10] 이렇게 출력하게 해주세요.
    //만약 enum값이 더 작으면 "종료값이 더 작을 수 없습니다. 가 출력되게 해주세요

    //내 답
    // function print_num_from_to($num1, $num2)
    // {
    //     if($num1 > $num2) 
    //     {
    //         print "종료값이 더 작을 수 없습니다.";
    //     }
    //     else
    //     {
    //         print "[";
    //         for($i = $num1; $i <= $num2; $i++)
    //         {
    //             print "$i";
    //             if($i !== $num2)
    //             {
    //                 print ", ";
    //             }
    //         }
    //         print "]<br>";
    //     }
    // }
    //case2
    $snum = 4;
    $enum = 2;
    print_num_from_to($snum, $enum);

    //강사님 답
    function print_num_from_to($snum, $enum)
    {
        if($enum < $snum)
        {
            print "<div>종료값이 더 작을 수 없습니다.</div>";
            return;     //아래 내용은 실행되지 않으므로 굳이 else를 할 필요가 없음!!
        }

        print "[";
        for($i=$snum; $i<=$enum; $i++)
        {
            if($i > $snum)
            {
                print ", ";
            }
            print $i;
        }
        print "]";
    }
?>