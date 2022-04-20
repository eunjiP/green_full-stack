<!-- 회원가입시 입력한 두 비밀번호가 일치하면 데이터베이스에 추가
    불일치하면 추가되지않고 바로 회원가입화면으로 이동
    (화면이 넘어가지 않고 팝업으로 표현하고 싶지만 조금더 보완필요...) -->
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
