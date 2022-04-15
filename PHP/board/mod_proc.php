<?php
    //수정완료 후 detail.php로 이동하도록 구현
    include_once "db.php";

    $i_board = $_POST['i_board'];   //post방식으로 보낸거라 post로 받아온다.
    $title = $_POST['title'];
    $ctnt = $_POST['ctnt'];

    $sql = "
        UPDATE t_board 
        SET title = '$title', 
        ctnt = '$ctnt',
        mod_at = now()
        WHERE i_board = $i_board
    ";
        //수정하는 쿼리문 작성
    $conn = get_conn();     //DB와 연결
    $result = mysqli_query($conn, $sql);    //수정 쿼리문 DB에 적용
    mysqli_close($conn);    //연결 종료
    header("Location: detail.php?i_board=$i_board");    //이동할 페이지 지정




?>