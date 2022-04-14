<?php
    //... : 가변 인자
    //...$vals : 값이 배열로 들어간다($vals변수명으로 변경가능)
    //내답 (for문사용)
    function print_sum(...$vals)
    {
        $hap = 0;
        for($i=0; $i < count($vals); $i++)
        {
            $hap += $vals[$i];
        }
        print "sum : " . $hap . "<br>";
    }
    print_sum(1, 2);       //sum : 3
    print_sum(1, 2, 3);    //sum : 6
    print_sum(1, 2, 3, 4); //sum : 10 결과값이 나오도록 함수 구현하기

    //강사님 답(foreach문 사용)
    // function print_sum(...$vals)
    // {
    //     $sum = 0;
    //     foreach($vals as $val)
    //     {
    //         $sum += $val;
    //     }
    //     print "sum : $sum<br>";
    // }

?>