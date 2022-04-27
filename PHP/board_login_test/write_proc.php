<?php
    include_once "db/db_user.php";
    include "db/db_board.php";
    // session_start();
    // $login_user = $_SESSION['login_user'];

    //t_board에 insert 완료 후 list.php로 이동
    $i_user = sessioncall('i_user');
    //세션값을 불러올 수 있는 함수를 구현해서 세션값이 필요할 때마다 함수 호출
    $title = $_POST['title'];
    $ctnt = $_POST['ctnt'];
    
    $param = [
        "title" => $title,
        "ctnt" => $ctnt,
        "i_user" => $i_user
    ];
    
    $result = ins_board($param);
    if($result) {
        header("Location: list.php");
    }
    
   