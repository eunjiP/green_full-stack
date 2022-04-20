<!-- 관리자가 학생 삭제 버튼을 누를 시에 데이터베이스에 실행되게 하는 php -->
<?php
    include "db.php";

    $id = $_REQUEST['id'];
    for ($i=0; $i < count($id) ; $i++) { 
        $conn = get_conn();
        $sql = "DELETE FROM members WHERE id = $id[$i]";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
    header("Location: list.php");
?>