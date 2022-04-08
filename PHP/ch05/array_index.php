<?php
    $numbers = array(10, 20, 5=>30, 40);
        //5=>30 : 5번 인덱스 값을 30값을 넣어라

    print_r($numbers);      //값이 있는 배열은 모두 출력
    print "<br>";
    print "count : " . count($numbers) . "<br>";    //count는 값이 있는 값만 카운트

    for($i=0; $i<count($numbers);$i++)
    {
        print $numbers[$i] . "<br>";
    }
    print "-- 끝 --";        
        //결국 for문에 배열의 길이만큼 반복하면 모든 값을 출력 할 수 없다.

?>
