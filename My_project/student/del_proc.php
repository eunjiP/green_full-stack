<?php
    include "db.php";

    $s_id = $_GET['s_id'];
    $conn = get_conn();
    $sql = "DELETE FROM t_student WHERE s_id = $s_id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: list.php");
?>