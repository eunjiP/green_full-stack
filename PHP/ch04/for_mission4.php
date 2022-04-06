<?php
    /*
    지금까지 배운 것을 모두 활용하여
    출력 : [1, 2, 3, 4, 5, 6, 7]
    */
    //방법1 : for문에 if문 사용
    print "[";
    for($i = 1; $i <= 7; $i++)
    {
        if($i == 7) 
        {
            print "${i}";
        }
        else
        {
            print "${i}, ";
        }
    }
    print "]";

    print "<br>";

    //방법2 : for문에 switch사용
    print "[";
    for($i = 1; $i <= 7; $i++)
    {
        switch ($i)
        {
            case 1:
                print $i;
                break;
            default:
                print ", $i";
        }
    }
    print "]";

    print "<br>";

    //포인트 - 숫자와 기호를 붙여서 출력할 생각하지말고 따로 따로 분리해서 출력
    //강사님 답안1(숫자 출력 후 , 출력)
    $end_val = 7;       // 끝나는 값을 변수로 두면 좀 더 변경이 용이하다.
    echo "[";
    for($i=1; $i <= $end_val; $i++)
    {
        print $i;
        if($i < $end_val)
        {
            print ", ";
        }
        
    }
    echo "]";

    print "<br>";

    //강사님 답안2(, 출력 후 숫자 출력)
    echo "[";
    for($i=1; $i <= $end_val; $i++)
    {
        if($i > 1)          // 1빼고 나머지 숫자 앞에는 ,를 찍어라.
        {
            print ", ";
        }
        print $i;
    }
    echo "]";

    print "<br>";

    //동기의 다른 답안
    echo "[";
    for ($i=1; $i < $end_val; $i++)
    {
        print $i . ", ";
    }
    print $i;           //따로 분리했지만 결국 echo $i . "]";와 같은 말
    echo "]";

?>