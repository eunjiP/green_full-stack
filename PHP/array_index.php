<?php
    $numbers = array(10, 20, 5=>30, 40);
        //5=>30 : 5번 인덱스 값을 30값을 넣어라(비추천)

    print_r($numbers);      //값이 있는 배열은 모두 출력
    print "<br>";
    print "count : " . count($numbers) . "<br>";    //count는 값이 있는 값만 카운트

    $numbers[2] = 30;   //key값을 문자열 취급으로 해서 가장 끝에 순서가 추가된다(시퀀스가 없다.)

    for($i=0; $i<count($numbers);$i++)
    {
        print $numbers[$i] . "<br>";
    }
    print "-- 끝 --";        
        //결국 for문에 배열의 길이만큼 반복하면 모든 값을 출력 할 수 없다.

    foreach($numbers as $key => $val)   //들어간 순서대로 foreach로 출력할 수 있다.
    {
        print "[$key]" . $val . "<br>";
    }
?>
