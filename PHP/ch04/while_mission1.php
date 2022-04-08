<?php
    /*
        val변수에 있는 숫자를 1부터 모두 더해주세요
        그리고 결과값을 출력해 주세요
        while문으로 해결
    */
    $val = rand(50, 100);
    print "val : $val <br>";
    $sum = 0;
    while($i < $val)
    {
        $i++;
        $sum += $i;     // $sum += ++$i; 이렇게 사용 가능
    }
    print $sum;

    print "<br>========================<br>";
    //for문으로 정답 확인용
    $sum2 = 0;
    for($i = 1; $i <= $val; $i++)
    {
        $sum2 += $i;
    }
    print $sum2;
?>
