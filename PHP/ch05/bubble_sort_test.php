<?php
    //버블 정렬 --로 풀어보기

    $arr = [10, 33, 12, 8, 1, 89, 11];
    for($i = count($arr)-1; $i > 0; $i--)
    {
        for($j = 0; $j < $i; $j++)
        {
            if($arr[$j] > $arr[$j+1])
            {
                $a = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $a;
            }
        }
    }
    print_r($arr);
?>
