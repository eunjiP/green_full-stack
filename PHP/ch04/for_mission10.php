<?php
    //문제) 랜덤 값을 이용해서 행과 열의 수가 랜덤 값인 표를 만드세요
    //      안의 내용은 차례대로 숫자가 입력되어야함
    $val = rand(3, 10);
    $num = 0;
    
    print "<table border = 10>";
    for($a = 0; $a < $val; $a++)
    {
        print "<tr>";
        for($b = 0; $b < $val; $b++)
        {
            $num++;
            print "<td>$num</td>";
        }
        print "</tr>";
    }
    print "</table>";

    print "<br>";

    //다른 동기의 풀이 (num변수를 사용하지 않고 내용 표현하기)
    print "<table border = 10>";
    for($a = 1; $a <= $val; $a++)
    {
        print "<tr>";
        for($b = 1; $b <= $val; $b++)
        {
            print "<td>" . $a * $b . "</td>";
        }
        print "</tr>";
    }
    print "</table>";

?>
