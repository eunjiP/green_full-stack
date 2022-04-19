<?php
    define('URL', 'Localhost');
    define('NAME', 'root');
    define('PW', '506greendg@');
    define('DB_NAME', 'student');
    
    function get_conn()
    {
        return mysqli_connect(URL, NAME, PW, DB_NAME);
    }

    function s_avg(...$val)
    {
        $sum = 0;
        for ($i=0; $i < count($val) ; $i++) { 
            $sum += $val[$i];
        }
        return $sum/count($val);
    }
    
?>