<?php
    session_start();
    session_destroy();  //사용전에 start를 해줘야함
    //destroy가 있는 페이지에서는 살아 있고 다음 페이지에서는 사라진다.(unset과의 차이점)
    //로그아웃시에 사용자 이름이 뜨고 로그아웃되게 구현하고 싶을때 쓰기 좋음
    print $_SESSION['var1'] . "<br>";
    print $_SESSION['var2'] . "<br>";
?>
<a href="confirm.php">확인</a>