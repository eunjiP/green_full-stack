<?php
    include "db.php";

    $s_id = $_GET['s_id'];
    $conn = get_conn();
    $sql = "SELECT s_name, k_score, m_score, e_score FROM t_student WHERE s_id = $s_id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if($row = mysqli_fetch_assoc($result))
    {
        $s_name = $row['s_name'];
        $k_score = $row['k_score'];
        $m_score = $row['m_score'];
        $e_score = $row['e_score'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>학생관리프로그램</title>
</head>
<body>
    <h1>점수 수정</h1>
    <form action="score_proc.php" method="post">
        <input type="hidden" name="s_id" value="<?=$s_id?>">
        <div><?=$s_name?>님의 점수를 입력해주세요</div>
        <div><input type="text" name="k_score" value="<?=$k_score?>" require></div>
        <div><input type="text" name="m_score" value="<?=$m_score?>" require></div>
        <div><input type="text" name="e_score" value="<?=$e_score?>" require></div>
        <input type="submit" value="등록/수정">
        <input type="reset" value="초기화">
    </form>
</body>
</html>