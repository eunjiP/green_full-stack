<?php
    include "db.php";

    $title = $_POST['title'];
    $ctnt = $_POST['ctnt'];

    print $title;

    $conn = get_conn();
    $sql = "INSERT INTO t_board (title, ctnt) values ('$title', '$ctnt')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    print $result;
    header("Location: list.php");
?>