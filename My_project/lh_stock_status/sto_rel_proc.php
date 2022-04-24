<?php
    include "db.php";

    $sto_rel = $_POST['sto_rel'];
    $sto_rel = ($sto_rel == '입고')? 'sto_amount':'rel_amount';
    $items = $_POST['items'];
    $cause = $_POST['cause'];
    $item = $_POST['item'];
    $sto_amount = $_POST['amount'];
    $create_at = $_POST['create_at'];
    $conn = get_conn();
    $sql = "INSERT INTO mach_stock_status 
        (items, cause, item, $sto_rel, create_at)
        VALUES ('$items', '$cause', '$item', '$sto_amount', '$create_at')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: machine.php");