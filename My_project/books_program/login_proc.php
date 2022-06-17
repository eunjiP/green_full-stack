<!-- 등록된 학생인지 확인 후 성공과 실패 표현 -->
<?php
    include "db.php";

    $id = $_POST['id'];
    $pw = $_POST['pw'];
    
    $conn = get_conn();
    $sql = "SELECT id, pw FROM members";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    while($row = mysqli_fetch_assoc($result))
    {
        $id2 = $row['id'];
        $pw2 = $row['pw'];

        if($id === $id2 && $pw === $pw2)
        {
            session_start();
            $_SESSION['id'] = "$id";
            header("Location: main.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1; url=login.php">
    <title>로그인 실패</title>
    <style>
        body {line-height: 30px; text-align: center;}
        #red {color:red;}
        .size {font-weight: bolder; font-size:1.2rem}
    </style>
</head>
<body>
    <h1>로그인에 <span id="red">실패</span>하였습니다!</h1>
    <div><span class="size">학번</span>과 <span class="size">비밀번호</span>를 정확히 입력해주세요</div>
    <div>혹시 학생등록을 하지 않으신 분은 가입 후에 이용이 가능합니다.</div>
    <a href="login.php"><button>다시 로그인</button></a>
    <a href="singup.html"><button>가입하기</button></a>
</body>
</html>