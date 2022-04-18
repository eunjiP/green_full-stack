<?php
    define("URL", "Localhost");
    define("NAME", "root");
    define("PW", "506greendg@");
    define("DB_NAME", "board2");

    function get_conn()
    {
        return mysqli_connect(URL, NAME, PW, DB_NAME);
    }
?>