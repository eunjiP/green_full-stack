<?php
    define("URL", "localhost");
    define("NAME", "root");
    define("PW", "dmswl1");
    define("DB_NAME", "board3");

    function get_conn()
    {
        return mysqli_connect(URL, NAME, PW, DB_NAME);
    }
?>