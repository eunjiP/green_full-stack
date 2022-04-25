<?php
    session_start();
    if(isset($_SESSION['login_user'])) {
        $login_user = $_SESSION['login_user'];
        $nm = $login_user['nm'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common.css">
    <title>리스트</title>
</head>
<body>
    <div id="container">
        <header>
            <?php
            if(isset($_SESSION['login_user'])) {
                print "<div>${nm}님 환영합니다.</div>";
            }
            ?>
            <div>
                <a href="list.php">리스트</a>
                <a href="write.php">글쓰기</a>
                <?=isset($_SESSION['login_user']) ? "<a href='logout.php'>로그아웃</a>" : "<a href='login.php'>로그인</a>" ?>
            </div>
        </header>
        <main>
            <h1>리스트</h1>
        </main>
    </div>
</body>
</html>