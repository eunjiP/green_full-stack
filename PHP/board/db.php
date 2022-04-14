<?php
    function get_conn() {
        define("URL", "localhost");
        define("USERNAME", "root");
        define("PASSWORD", "506greendg@");
        define("DB_NAME", "board1");
        return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME);    //마지막에 포트번호입력(다를경우)
    }
?>  
<!-- php문만 있으면 끝에 안닫아 주는게 성능면에서 더 좋다 -->