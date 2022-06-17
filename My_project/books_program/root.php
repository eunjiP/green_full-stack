<!-- 관리자 로그인페이지 -->
<?php
    session_start();
    session_destroy();
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
        div > form{line-height: 30px;}
        div > div {margin: 10px;}
        .cursor, button {cursor:pointer;}
    </style>
</head>
<body>
    <div>
        <h1>관리자 페이지 입니다.</h1>
        <h4>관리자의 아이디와 비밀번호를 입력해주세요😀</h4>
        <form action="root_login.php" method="post">
            <div><input type="text" name="id" placeholder="아이디" required></div>
            <div><input type="password" name="pw" placeholder="비밀번호" required></div>
            <input class='cursor' type="submit" value="로그인">
            <input class='cursor' type="reset" value="초기화">
        </form>
        <div>
            <a href="login.php"><button>학생로그인창</button></a>
        </div>
    </div>
</body>
</html>