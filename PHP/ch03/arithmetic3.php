<?php
    // && : true 만들기가 힘듬. false 만들기가 쉬움.
    // || : false 만들기가 힘듬. true 만들기가 쉬움.

    //tip)and연산자의 if문의 처음 조건은 false가 될 가능성이 높은 것을 주는게 좋다.(성능)
    //문자열이 빈칸이면 false, 한개라도 있으면 ture(변수의 선언만 하게되면 빈칸과 같은 것이기 때문에 false로 취급)
    //숫자는 0만 false, 나머지 정수는 ture
    $name;
    if(1 && 1 && 1 && 1 && 0 && 'a' % $name) 
    {
        print "나는 진실이다! <br>";
    }
    else
    {
        print "나는 거짓이다!! <br>";
    }

    //tip)or연산자의 if문의 처음 조건은 ture가 될 가능성이 높은 것을 주는게 좋다.
    if(0 || 0 || 0 || 1) 
    {
        print "I'm true";
    }
?>