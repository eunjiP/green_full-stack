<?php
    setcookie("country", "한국");   
    //바로 이동했을때는 이전에 페이지에서 넘어온 값이 먼저보이고 새로고침을 했을때 나타남
    echo "Country : ". $_COOKIE['country'], "<br>";

    $_COOKIE['country'] = "UK";     //내컴퓨터에 저장된 쿠키값이 변경되는건 아니다
    echo "Country : ". $_COOKIE['country'], "<br>";

    setcookie("country", "UK");     //브라우저의 쿠키값까지 변경하고 싶으면 다시 setcookie해야함
    echo "Country : ". $_COOKIE['country'], "<br>";
    /*
    unset($_COOKIE['country']);     //출력은 되지않지만 실질적으로 쿠키가 지워지는게 아니다
    setcookie("country");           //브라우저 안에서 삭제까지 셋트로 해주는게 좋다
    */
    echo "Country : ". $_COOKIE['country'], "<br>";
?>