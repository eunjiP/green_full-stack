<?php
    include "db.php";

    $num = $_GET['num'];
    $conn = get_conn();
    $sql = "DELETE FROM income_spend WHERE num = $num";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: list.php");
?>