<?php
    define("URL", "localhost");     //원격 컴퓨터라면 그 컴퓨터의 ip주소를 입력
    define("USERNAME", "root");
    define("PASSWORD", "506greendg@");
    define("DB_NAME", "board1");
    define("PORT", "3306");     //같을 경우 생략가능

    function get_conn() 
    {
        return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME, PORT);    //마지막에 포트번호입력(다를경우)
    }
    //함수로 호출하게 되면 수정에 용이하다
?>  
<!-- php문만 있으면 끝에 안닫아 주는게 성능면에서 더 좋다 -->