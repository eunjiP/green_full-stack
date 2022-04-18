<?php
    include "db.php";

    $title = $_POST['title'];
    $ctnt = $_POST['ctnt'];

    $conn = get_conn();
    $sql = "INSERT INTO t_board (title, ctnt) VALUES ('$title', '$ctnt')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: list.php");
?>