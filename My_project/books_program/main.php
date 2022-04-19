<?php
    // 로그인 후에 이용할 수 있도록 하고 로그아웃을 누르기 전까지 학번은 계속 옮기는 페이지에 이동시킨다.
    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>도서관리프로그램</title>
    <style>
        body {text-align: center;}
        body > div {border: 1px dotted #000;
            border-radius: 10px;}
        div > div {margin-bottom: 20px;}
    </style>
</head>
<body>
    <h1>원하시는 메뉴를 선택해주세요</h1>
    <div>
        <h4>안녕하세요 도서관리프로그램입니다<br>😀원하시는 서비스를 선택해주세요😀</h4>
        <div><a href="lent.php?id=<?=$id?>"><button>도서 대여</button></a></div>
        <div><a href="return.php?id=<?=$id?>"><button>도서 반납</button></a></div>
        <a href="login.php"><button>로그아웃</button></a>
    </div>
</body>
</html>