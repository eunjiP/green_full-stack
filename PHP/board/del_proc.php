<?php
    include_once "db.php";  //DB와 연결하기 위해 db.php불러오기

    $i_board = $_GET['i_board'];    //내가 필요한 값 가져오기
    $sql = "DELETE FROM t_board WHERE i_board = $i_board";  //실행할 쿼리문작성(DB에서 실제로 적용되는지 확인 후 가져오기)
    $conn = get_conn();     //DB와 연결
    $result = mysqli_query($conn, $sql);    //작성한 쿼리문 실행해서 결과 받아오기
    mysqli_close($conn);    //DB와 연결 해제
    header("Location: list.php");   //리다이렉션으로 원하는 페이지로 이동하기

?>