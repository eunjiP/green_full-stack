<?php
    include "db.php";

    $conn = get_conn();
    $sql = "SELECT *, SUM(sto_amount), SUM(rel_amount) FROM mach_stock_status
    GROUP BY item, items";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>