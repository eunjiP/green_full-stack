<!-- 상세 페이지에서 목록 삭제 눌렀을때 DB에 전달 -->
<?php
    include "db.php";

    $num = $_GET['num'];
    $conn = get_conn();
    $sql = "DELETE FROM income_spend WHERE num = $num";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: list.php");
?>