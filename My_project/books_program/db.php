<?php
    //기본 데이터베이스 연결
    define('URL', 'Localhost');
    define('NAME', 'root');
    define('PW', '506greendg@');
    define('DB_NAME', 'books');
    
    function get_conn()
    {
        return mysqli_connect(URL, NAME, PW, DB_NAME);
    }
?>