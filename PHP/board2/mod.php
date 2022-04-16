<?php
    include "db.php";

    $i_board = $_GET['i_board'];
    $conn = get_conn();
    $sql = "SELECT title, ctnt FROM t_board WHERE i_board = $i_board";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result))
    {
        $title = $row['title'];
        $ctnt = $row['ctnt'];
    }
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글수정</title>
</head>
<body>
    <h1>글수정</h1>
    <a href="detail.php?i_board=<?= $i_board ?>"><button>뒤로가기</button></a>
    <form action="mod_proc.php" method="post">
        <input type="hidden" name="i_board" value="<?= $i_board ?>">
        <div><input type="text" name="title" placeholder="제목" value="<?= $title ?>"></div>
        <div><textarea name="ctnt" placeholder="내용"><?= $ctnt ?></textarea></div>
        <div>
            <input type="submit" value="글수정">
            <input type="reset" name="초기화">
        </div>
    </form>
</body>
</html>