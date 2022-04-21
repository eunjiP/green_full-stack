<!-- 지출 등록시 입력한 정보를 받아와서 DB에 전달하는 역할 -->
<?php
    include "db.php";

    $in_out = $_POST['in_out'];
    $method = $_POST['method'];
    $create_at = $_POST['create_at'];
    $item = $_POST['item'];
    $money = $_POST['money'];
    $memo = $_POST['memo'];

    $conn = get_conn();
    $sql = "INSERT INTO income_spend (money, create_at, memo, in_out, method, item) 
    VALUES ('$money', '$create_at', '$memo', '$in_out', '$method', '$item')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: main.php");
?>