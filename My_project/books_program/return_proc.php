<?php
    // 반납할 책을 선택 후 반납을 누르게되면 대여자의 아이디가 저장된 테이블의 값을 0으로 변경
    // 그 후에 다시 로그인할 필요없도록 메인페이지에 아이디를 전달한다.
    include "db.php";

    $id = $_POST['id'];
    $book_id = $_POST['book_id'];

    $conn = get_conn();
    $sql = "UPDATE t_books SET lender_id = 0 WHERE book_id = $book_id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: main.php?id=$id");
?>