<!-- 수입등록창에서 내용 입력 후 입력한 내용을 DB로 전달 -->
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