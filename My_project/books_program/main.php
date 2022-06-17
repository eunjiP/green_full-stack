<?php
    // 로그인 후에 이용할 수 있도록 하고 로그아웃을 누르기 전까지 학번은 계속 옮기는 페이지에 이동시킨다.
    session_start();
    $id = $_SESSION['id'];
    include "db.php";

    $conn = get_conn();
    $sql = "SELECT lender FROM members WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $name = (mysqli_fetch_assoc($result))['lender'];
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <title>도서관리프로그램</title>
    <style>
        body {text-align: center;}
        body > div {border: 1px dotted #000;
            border-radius: 10px;
            }
        div > div {margin-bottom: 10px;}
        i {font-size:2rem; color: #000;}
        #out { text-align:right;
            margin-right: 5vw;}
        button {cursor:pointer;}
    </style>
</head>
<body>
    <h1>반갑습니다. <?=$name?>님</h1>
    <div>
        <h4>😀원하시는 서비스를 선택해주세요😀</h4>
        <div><a href="lent.php"><button>도서 대여</button></a></div>
        <div><a href="return.php"><button>도서 반납</button></a></div>
        <div><a href="b_list.php"><button>도서 목록</button></a></div>
        <div id="out"><a href="login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i></a></div>
    </div>
</body>
</html>