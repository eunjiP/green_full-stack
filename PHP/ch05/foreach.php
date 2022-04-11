<?php
    /*
    다른 언어와 php가 다른점
    안 쪽에 있는 값만 사용할때 사용 하지만 php는 key값까지 사용함
    foreach : 값을 출력할때 주로 사용/for : 수정까지 해야한 다하면 사용
    */
    $array = array(100, 200, 300, 400, 500);

    foreach($array as $val)     //다음 값을 순차적으로 넣어준다
    {
        print $val . "<br>";
    }
    print "------------------------- <br>";

    foreach($array as $key => $val)   //key값까지 넣어서 사용도 가능(변수명은 자유 but 위치는 바뀌면 안된다)  
    {
        print "[$key]" . $val . "<br>";
    }
    print "------------------------- <br>";
?>