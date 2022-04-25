<?php
    include "db/db_board.php";
    session_start();
    $login_user = $_SESSION['login_user'];

    //t_board에 insert 완료 후 list.php로 이동
    $i_user = $login_user['i_user'];
    $title = $_POST['title'];
    $ctnt = $_POST['ctnt'];
    
    $param = [
        "title" => $title,
        "ctnt" => $ctnt,
        "i_user" => $i_user
    ];
    
    $result = ins_board($param);
    header("Location: list.php");