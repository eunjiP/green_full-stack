<?php
    include_once "db/db_board.php";
    session_start();
    $nm = "";
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
                <a href='write.php'>글쓰기</a>
            <?php
                if(isset($_SESSION['login_user'])) { ?>
                    <a href='logout.php'>로그아웃</a>
                <?php }
                else { ?>
                    <a href='login.php'>로그인</a>
                <?php }
            ?>
            </div>
        </header>
        <main>
            <h1>리스트</h1>
            <!-- 글번호, 제목, 작성자명, 등록일시(테이블형식) -->
            <table>
                <tr>
                    <th>글번호</th>
                    <th>제목</th>
                    <th>작성자명</th>
                    <th>등록일시</th>
                </tr>
                <?php
                    $result = sel_board_list();
                    while($row = mysqli_fetch_assoc($result)) {
                        $i_board = $row['i_board'];
                        $title = $row['title'];
                        $nm = $row['nm'];
                        $created_at = $row['created_at'];

                        print "<tr>";
                        print "<td>$i_board</td>";
                        print "<td><a href='detail.php?i_board=$i_board'>$title</td>";
                        print "<td>$nm</td>";
                        print "<td>$created_at</td>";
                        print "</tr>";
                    }
                ?>
            </table>
        </main>
    </div>
</body>
</html>