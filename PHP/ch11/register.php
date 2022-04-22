<?php
    session_start();
    $_SESSION['var1'] = "v1";
    $_SESSION['var2'] = "v2";    
    //세션을 한번 보내놓으면 서버에 저장되어있기 때문에 주석처리해도 내용이 유지된다.

    // unset($_SESSION['var2']);   //같은 창에서 바로 삭제(==session_destroy())

    print $_SESSION['var1'] . "<br>";
    print $_SESSION['var2'] . "<br>";
?>
<a href="session_destroy.php">destroy</a>
