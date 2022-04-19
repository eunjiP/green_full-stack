<!-- 학생추가시 데이터베이스에 정보 전달 -->
<?php
    include "db.php";
    
    $id = $_POST['id'];
    $lender = $_POST['lender'];

    //중복된 학번이 있는 경우 오류페이지가 보이고 정상적으로 로그인될 경우 로그인창으로 간다.
    try {
        $conn = get_conn();
        $sql = "INSERT INTO members (id, lender) VALUES ('$id', '$lender')";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location:login.php");
    } catch (\Throwable $th) {
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>학생 추가 오류</title>
    <style>
        body {line-height:30px; margin: 50px 50px}
        span {color: #ff0000; font-size: 2rem;}
        div {text-align: center;}
    </style>
</head>
<body>
    <h4>입력하셨던 학번은 <span>이미 등록된 학번</span>입니다.</h4>
    <div>
        <a href="singup.html"><button>다시입력</button></a>
        <a href="list.php"><button>학생리스트</button></a>
    </div>
</body>
</html>