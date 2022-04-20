<?php
    // 예외처리 수업 후에 중복되는 값은 다시 확인해 달라고 오류멘트 넣기!!!
    include "db.php";

    $title = $_POST['title'];
    $author = $_POST['author'];
    
    $conn = get_conn();
    $sql = "INSERT INTO t_books (title, author) VALUES ('$title', '$author')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: root_main.php");
?>