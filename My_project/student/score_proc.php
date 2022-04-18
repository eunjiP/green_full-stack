<?php
    include "db.php";

    $s_id = $_POST['s_id'];
    $k_score = $_POST['k_score'];
    $m_score = $_POST['m_score'];
    $e_score = $_POST['e_score'];

    $conn = get_conn();
    $sql = "UPDATE t_student 
    SET k_score = $k_score, m_score = $m_score, e_score = $e_score
    WHERE s_id = $s_id";
    $result = mysqli_query($conn, $sql);
    header("Location: list.php");
?>