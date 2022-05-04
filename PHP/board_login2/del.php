<?php
    //삭제 성공시 list.php로 이동!
    include_once "db/db_board.php";
    session_start();
    $param = [
        'i_board' => $_GET['i_board'],
        'i_user' => $_SESSION['login_user']['i_user']
        //i_user값일치 여부까지 넣지 않으면 PK값을 알아버리면 삭제할 수 있다
    ];
    $result = del_board($param);
    if($result) {
        header("Location: list.php");
    }
    
