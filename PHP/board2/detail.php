<?php
    include "db.php";

    $i_board = $_GET['i_board'];
    $conn = get_conn();
    $sql = "SELECT * FROM t_board WHERE i_board = $i_board";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if($row = mysqli_fetch_assoc($result))
    {
        $title = $row['title'];
        $create_at = $row['create_at'];
        $ctnt = $row['ctnt'];

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <a href="list.php"><button>리스트</button></a>
    <a href="del_proc.php?i_board=<?= $i_board ?>"><button>삭제</button></a>
    <a href="mod.php?i_board=<?= $i_board ?>"><button>수정</button></a>
    <div>제목 : <?= $title ?></div>
    <div>등록날짜 : <?= $create_at ?></div>
    <div>내용 : <?= $ctnt ?></div>
</body>
</html>