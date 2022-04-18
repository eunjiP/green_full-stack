<?php
    include "db.php";

    $s_id = $_POST['s_id'];
    $s_name = $_POST['s_name'];

    $conn = get_conn();
    $sql = "INSERT INTO t_student (s_id, s_name) VALUES ($s_id, '$s_name')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('Location: list.php');
?>