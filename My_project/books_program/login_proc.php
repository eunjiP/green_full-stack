<!-- 등록된 학생인지 확인 후 성공과 실패 표현 -->
<?php
    include "db.php";

    $id = $_POST['id'];
    $lender = $_POST['lender'];
    
    $conn = get_conn();
    $sql = "SELECT * FROM members";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    while($row = mysqli_fetch_assoc($result))
    {
        $id2 = $row['id'];
        $lender2 = $row['lender'];

        if($id === $id2 && $lender === $lender2)
        {
            header("Location: main.php?id=$id");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 실패</title>
    <style>
        body {line-height: 30px;}
    </style>
</head>
<body>
    <h1>로그인에 실패하였습니다!</h1>
    <div>학번과 이름을 정확히 입력해주세요</div>
    <div>혹시 학생등록을 하지 않으신 분은 학생등록 후에 이용이 가능합니다.</div>
    <a href="login.php"><button>다시 로그인</button></a>
    <a href="singup.html"><button>학생추가</button></a>
</body>
</html>