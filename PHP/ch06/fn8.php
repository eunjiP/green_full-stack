<?php
    $val = rand(2, 5);

    print_table($val);

    //문제)$val = 2 => 2 * 2 크기의 테이블 생성하는 함수 구현

    function print_table($num)
    {
        $number = 1;
        print "<table border=1>";
        for($i=0; $i < $num; $i++)
        {
            print "<tr>";
            for($j=0; $j<$num; $j++)
            {
                print "<td>$number</td>";
                $number++;
            }
            print "</tr>";
        }
        print "</table>";
    }
?>