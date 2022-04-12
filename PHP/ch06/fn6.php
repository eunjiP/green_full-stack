<?php
    $star = rand(3, 10);

    // print_star($star);

    //$star = 3 >> *** / $star = 5 >> *****
    //문제) 함수 구현하기
    //내 답(답 동일)
    function print_star($num)
    {
        for($i=0; $i < $num; $i++)
        {
            print "*";
        }
    }

    //문제2) print_star_line을 구현하세요
    /* 
    $star = 3
    *** 
    *** 
    ***
    */
    //내 답 - 함수 재활용한 풀이
    // print_star_line($star);
    // function print_star_line($num)
    // {
    //     for($i=0; $i < $num; $i++)
    //     {
    //         print_star($num);
    //         print "<br>";
    //     }
    // }

    //강사님 답
    function print_star_line($num)
    {
        for($i=0; $i < $num; $i++)
        {
            for($j=0; $j < $num; $j++)
           {
               print "*";
           }
           print "<br>";
        }
    } 

    //문제3) print_star_triangle 함수 구현
    print_star_triangle($star);
    /* 
    $star = 3
    * 
    ** 
    ***
    */
    //내답
    // function print_star_triangle($star)
    // {
    //     for($i=0; $i < $star; $i++)
    //     {
    //         for($j=0; $j <= $i; $j++)
    //         {
    //             print "*";
    //         }
    //     print "<br>";
    //     }
    // }

    //강사님 답(함수 재사용!-사용하는 요령=>전체 함수 작성 후 동일한 함수정의를 이전에 정의한 함수와 같으면 대체한다.)
    function print_star_triangle($star)
    {
        for($i=1; $i < $star; $i++)
        {
            print_star($i);
            print "<br>";
        }
    }
?>