<?php
    // 예외처리 수업 전에 배열로 현재 있는 값을 담아서 확인하도록 하여 강제예외처리 생성함
    //수업 후 더 좋은 방법을 배우면 보완예정
    include "db.php";

    $title = $_POST['title'];
    $author = $_POST['author'];

    $conn = get_conn();
    $sql1 = "SELECT title, author FROM t_books";
    $result1 = mysqli_query($conn, $sql1);
    mysqli_close($conn);
    
    $title_list = [];
    $author_list = [];

    while ($row = mysqli_fetch_assoc($result1)) {
        $title_r = $row['title'];
        $author_r = $row['author'];

        array_push($title_list, $title_r);
        array_push($author_list, $author_r);
    }

    for ($i=0; $i < count($title_list); $i++) { 
        if($title == $title_list[$i] && $author == $author_list[$i])
        {
            header("Location: add_error.php");
            die();
        }
    }

    $conn = get_conn();
    $sql2 = "INSERT INTO t_books (title, author) VALUES ('$title', '$author')";
    $result2 = mysqli_query($conn, $sql2);
    mysqli_close($conn);
    header("Location: root_main.php");
?>