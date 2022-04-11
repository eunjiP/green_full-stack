<?php
    //버블 정렬 구현해보기(mission)
    //버블정렬 : 인접한 수 값을 비교하여 큰 값을 뒤로 보낸다(뒤에서부터 정렬한다고 생각하면 된다.)

    //내가 생각한 답
    $arr = [10, 33, 12, 8, 1, 89, 11];

    for($i = 1; $i <= count($arr)-1; $i++)
    {
        for($j=0;$j < count($arr)-$i; $j++)
        {
            if($arr[$j] > $arr[$j+1])
            {
                $a = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $a;
            }
        }
        print_r($arr);
        print "<br>";
    }
    print "<br>";
    print_r($arr);
    print "<br>";
    print "<br>";
    
    //강사님 답
    $arr = [10, 33, 12, 8, 1, 89, 11];

    for($i=count($arr)-1; $i>0; $i--)
    {
        for($z=0; $z<$i; $z++)
        {
            if($arr[$z] > $arr[$z+1])
            {
                $temp = $arr[$z];
                $arr[$z] = $arr[$z+1];
                $arr[$z+1] = $temp;
            }
        }
        print_r($arr);
        print "<br>";
    }
    print "<br>";
    print_r($arr);


?>