<?php
    define("URL", "Localhost");
    define("USERNAME", "root");
    define("PASSWORD", "dmswl1");
    define("DB_NAME", "board1");

    function get_conn()
    {
        return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME);
    }
?>