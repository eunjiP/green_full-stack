<?php
    include "db.php";

    $num = $_POST['num'];
    $in_out = $_POST['in_out'];
    $create_at = $_POST['create_at'];
    $item = $_POST['item'];
    $method = $_POST['method'];
    $money = $_POST['money'];
    $memo = $_POST['memo'];

    if ($in_out == "수입") {
        $conn = get_conn();
        $sql = "UPDATE income_spend 
        SET create_at = '$create_at', item = '$item', money = $money, memo = '$memo' 
        WHERE num = $num";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location: detail.php?num=$num");
    }

    elseif($in_out == "지출") 
    {
        $conn = get_conn();
        $sql = "UPDATE income_spend 
        SET method = '$method', create_at = '$create_at', item = '$item', money = $money, memo = '$memo' 
        WHERE num = $num";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location: detail.php?num=$num");
    }
    
?>