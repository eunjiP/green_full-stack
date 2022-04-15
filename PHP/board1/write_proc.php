<?php
    include "db.php";

    $title = $_POST['title'];
    $ctnt = $_POST['ctnt'];

    $sql = "
    INSERT INTO t_board
    (title, ctnt)
    VALUE 
    ('$title', '$ctnt')
    ";
    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: list.php");
?>