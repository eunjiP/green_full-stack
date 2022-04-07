<?php
    //문제)1~10까지의 숫자의 중 랜덤의 숫자 만큼 *을 표현하세요
    $star = rand(1, 10);
    print "star : $star<br>";
    for($i = 0; $i < $star; $i++)
    {
        print "*";
    }

    print "<br>";

    //다른 풀이 방법
    for($i = $star; $i > 0; $i--)
    {
        print "*";
    }

    print "<br>";


    //자발적 응용1)*이 랜덤숫자까지 하나씩 증가하면서 한줄씩 출력되도록 해주세요
    for($i = 0; $i < $star; $i++)
    {
        for($j = 0; $j <= $i; $j++)
        {
            print "*";
        }
        print "<br>";
    }

    print "<br>";

    //자발적 응용2)*이 랜덤숫자까지 하나씩 감소하면서 한줄씩 출력되도록 해주세요
    for($i = $star; $i > 0 ; $i--)
    {
        for($j = $i; $j > 0; $j--)
        {
            print "*";
        }
        print "<br>";
    }

?>