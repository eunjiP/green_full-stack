<?php
//문제 num을 변경 했을때 num(는)은 홀수 입니다./num(는)은 짝수 입니다.
    //방법1
    $num = 16;
    $odd_even = "홀";
    if($num % 2 == 0) 
    {
        $odd_even = "짝";
    }

    print "${num}는(은) ${odd_even}수입니다.";

    //방법2
    $num = 7;
    if($num % 2 == 0) 
    {
        print $num . "은(는) 짝수입니다.";
        print "${num}은(는) 짝수입니다.";
    }
    else 
    {
        print $num . "은(는) 홀수입니다.";
        print "${num}은(는) 홀수입니다.";
    }
  
?>