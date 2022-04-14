<?php
    //아래 3줄은 수정하지 않고 함수 구현하기
    //내답
    function plus_array(&$arr, $num)    //원래의 값이 변해야 함으로 주소값을 들고와서 변경 해주어야한다.
    {
        for ($i=0; $i < count($arr); $i++) { 
            $arr[$i] += $num;
        }
    }

    $arr = [10, 20, 30, 40, 50];
    plus_array($arr, 5);
    print_r($arr);

    //강사님 답
    function plus_array(&$arr, $val)
    {
        foreach ($arr as $k => $v) {
            $arr[$k] = $v + $val;
        }
    }
?>