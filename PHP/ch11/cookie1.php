<?php
    //검색 목록 남길때 주로 사용
    setcookie("country", "Korea");
    if(isset($_COOKIE['country']))
    {
        echo "Country : ". $_COOKIE['country'], "<br>";
        //setcookie 하고 나서 바로 사용할 수 없고 우선 값을 저장한 다음 그때부터 변경된다. 
    }
    
?>
<a href="cookie2.php">Next Page</a>