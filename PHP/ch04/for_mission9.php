<?php
    /*문제) 만약 star값이 3이면
    *
    **
    ***
     */
    $star = rand(3, 10);
    print $star . "<br>";

    for($i = 1;$i <= $star; $i++)
    {
        for($j=1; $j <= $i; $j++)
        {
            print "*";
        }
        print "<br>";
    }


    //다른 동기의 답안(for문 하나로 타입이 없는 php를 활용을 잘한 답인 것 같다.)
    $sum = "";
    for($i = 1; $i <= $star; $i++)
    {
        $sum = $sum . "@";          // sum함수에 "@"문자열을 하나씩 늘리면서 추가
        print "$sum<br>";
    }
    /*
    i=1 : sum = @
    i=2 : sum = @@(sum2 = sum1(@) + @)
    i=3 : sum = @@@(sum3 = sum2(@@) + @)
    . 
    . 
    i=star : sum = star의 갯수만큼의 @가 나온다.
    */


?>
