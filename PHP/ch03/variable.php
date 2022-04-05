<?php
    //single-line comment
    /*
        multi-line comment
    */
    $age = 21;  // =은 대입연산자 : 오른쪽의 값을 복사하여 왼쪽에 준다.
    print "<div>" . $age . "</div>";    // . 은 문자열 합치기 기능

    //변수 : 변할 수 있는 통
    //PHP는 타입이 잘 변하기 때문에 사용은 편하지만 신뢰성이 떨어진다.(주의 필요)

    $name;  //변수의 선언
    print "<div>" . $name . "</div>";   //선언 전이라 빈칸

    $name = "홍길동";   //선언 후 대입
    print "<div>" . $name . "</div>";

    $name = "장보고";   
    print "<div>" . $name . "</div>";

    $name = 10;   
    print "<div>" . $name . "</div>";


    /*변수명 네이밍 규칙
    1. 대소문자 영어, 숫자, 특수기호 _(언더바) 로 이루어져야함.(특수기호는 언더바만 사용가능!)
    2. 숫자가 맨 앞에 오면 안된다.
    3. 문자 사이에 빈칸 안된다.(언더바 사용권장)
    */
    $a2b = 12;
    print $a2b;

    $_123 = "dddd";
    print $_123;

?>

<!-- html의 주석 표현 -->
