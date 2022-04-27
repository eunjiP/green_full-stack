<?php
    include_once "db/db_board.php";
    session_start();    //세션값 사용과 세트!!! 꼭 기억하기
    $i_board = $_POST['i_board'];
    $param = [
        'i_board' => $i_board,
        'i_user' => $_SESSION['login_user']['i_user'],
        'title' => $_POST['title'],
        'ctnt' => $_POST['ctnt']
    ];
    $result = upd_board($param);
    if($result) {
        header("Location: detail.php?i_board=$i_board");
    }