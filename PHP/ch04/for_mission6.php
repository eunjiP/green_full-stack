<?php
    //문제) 구구단을 2단부터 9단까지 옆으로 나오도록 만들기
    for($i = 1; $i < 10; $i++)
    {
        print "<div>";
        for($dan = 2; $dan < 10; $dan++)
        {
            print "${dan} X ${i} = " . $dan * $i . "\t";
        }
        print "</div>";
    }
    
    print "<br>";

    //개행 방법만 다름
    for($i = 1; $i < 10; $i++)
    {
        for($dan = 2; $dan < 10; $dan++)
        {
            print "${dan} X ${i} = " . $dan * $i . " ";
        }
        print "<br>";
    }
   


?>