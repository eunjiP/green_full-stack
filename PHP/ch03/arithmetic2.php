<?php
    //증감 연산자
    $n1 = 10;

    $n1++;  //증가 연산자
    print "$n1 <br>";

    ++$n1;  //증가 연산자
    print "$n1 <br>";

    print "!---------------------------<br>";

    $n2 = 10;
    $sum = 10 + $n2++;  //뒤에 있으면 연산을 먼저하고 결과값을 담은 후 변수에 1증가한다.
    print "$sum <br>";
    print "$n2 <br>";

    print "!!---------------------------<br>";

    $n2 = 10;
    $sum = 10 + ++$n2;  //앞에 있을때는 변수에 1증가 시키고 연산을 한다.
    print "$sum <br>";
    print "$n2 <br>";

    print "!!!---------------------------<br>";

    $n3 = 10;
    $n3 = $n3 + 1;  // $n3++;
    print "$n3 <br>";

    print "!!!!---------------------------<br>";
    //산술대입연산자
    $n4 = 10;
    $n4 += 2;   //$n4 = $n4 + 2 와 같은 의미
    print "$n4 <br>";

    print "!!!!!---------------------------<br>";
    //비교연산자
    $oprd1 = '10';
    $oprd2 = 10;

    //boolen 형이 존재 하지 않아서 false면 빈칸이 나옴
    $result = $oprd1 == $oprd2;     // 안의 값만 비교(타입은 달라도 가능)
    print "$oprd1 == $oprd2 : $result <br>";

    $result = $oprd1 === $oprd2;    // 타입과 값이 모두 같아야 참
    print "$oprd1 === $oprd2 : $result <br>";

    $result = $oprd1 != $oprd2; 
    print "$oprd1 != $oprd2 : $result <br>";

?>
