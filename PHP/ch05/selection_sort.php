<?php
    //선택 정렬 : 최솟값을 찾아서 가장 앞에부터 정렬한다
    //선택 정렬 구현해보기
    //참고 링크 : https://gmlwjd9405.github.io/2018/05/06/algorithm-selection-sort.html

    //내가 생각한 답
    $arr = [10, 33, 12, 8, 1, 89, 11];

    for($i=0; $i < count($arr)-1; $i++)     //0~5 : 6번
    {
        for($j=$i+1;$j < count($arr); $j++) //1~6 : 6번
        {
            if($arr[$i] > $arr[$j])
            {
                $a = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $a;
            }
        }
        print_r($arr);
        print "<br>";
    }
    print "<br>";
    print_r($arr);
    print "<br>";

    //강사님 답
    $arr = [10, 33, 12, 8, 1, 89, 11];

    for($i=0;$i<count($arr)-1;$i++)
    {
        $idx = $i;
        for($z=$i+1;$z<count($arr);$z++)
        {
            if($arr[$idx] > $arr[$z])
            {
                $idx = $z;
            }
        }
        if($idx != $i)      //없어도 되지만 조금의 성능 향상을 위한 것
        {
            $temp = $arr[$idx];
            $arr[$idx] = $arr[$i];
            $arr[$i] = $temp;
        }
    }
    print "<br>";
    print_r($arr);
?>