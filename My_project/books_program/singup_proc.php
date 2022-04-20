<!-- 학생추가시 데이터베이스에 정보 전달 -->
<?php
    include "db.php";
    
    $id = $_POST['id'];
    $lender = $_POST['lender'];
    $pw = $_POST['pw'];
    $re_pw = $_POST['re_pw'];

    if ($pw === $re_pw) {
        try {
            $conn = get_conn();
            $sql = "INSERT INTO members (id, pw, lender) VALUES ($id,'$pw' ,'$lender')";
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            header("Location:login.php");
        } catch (\Throwable $th) {
            header("Location:error.php");
        }
    }
    else {
        header("Location:singup.html");
    }

    
?>
