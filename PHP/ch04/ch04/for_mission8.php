<?php
    $star = rand(2, 10);
    /*
    문제)
    만약 star값이 2

    **
    **

    */
    print $star . "<br>";
    for($i = 0; $i < $star ;$i++)
    {
        for($j = 0; $j < $star ;$j++)
        {
            print "*";
        }
        print "<br>";
    }

?>