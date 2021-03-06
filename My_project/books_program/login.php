<!-- 로그인페이지 -->
<!-- 
보완점
-일반사용자, 관리자 모두 보안적용이 안되어있음
(로그인을 하고 들어가더라도 보안유지가 되지않아 같은 주소로 들어가면 그 계정을 사용가능함)
-전체적으로 홈페이지라고 하기에 단촐한 느낌이 있음
-예외처리되어 있지않음(알 수 없는 오류가 많이 있을 것으로 예상)
-오류시에 페이지이동이 아닌 팝업으로 전달하도록 구현 -->
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
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <title>도서관리프로그램</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <header>
            <h1 class="login__top"><i class="fa-solid fa-book"></i>도서관리프로그램<i class="fa-solid fa-book"></i></h1>
        </header>
        <main class="login__main">
            <h4 class="main__title">이용자의 학번과 비밀번호를 입력해주세요</h4>
            <form action="login_proc.php" method="post" class="login_form">
                <div><input type="text" name="id" placeholder="학번" required></div>
                <div><input type="password" name="pw" placeholder="비밀번호" required></div>
                <input class='cursor' type="submit" value="로그인">
                <input class='cursor' type="reset" value="초기화">
            </form>
        </main>
        <footer>
            <div class="login__footer">
                <div>처음 이용하시는 학생은 가입 후에 이용바랍니다!</div>
                <a href="singup.html"><button class='cursor'>가입하기</button></a>
                <a href="list.php"><button class='cursor'>학생리스트</button></a>
                <a href="root.php"><button class='cursor'>관리자페이지</button></a>
            </div>
        </footer>
    </div>
</body>
</html>