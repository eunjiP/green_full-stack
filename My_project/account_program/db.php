<!-- 데이터 베이스 연결 -->
<?php
    define('URL', 'Localhost');
    define('NAME', 'root');
    define('PW', '506greendg@');
    define('DB_NAME', 'account_book');
    
    function get_conn()
    {
        return mysqli_connect(URL, NAME, PW, DB_NAME);
    }
    
?>