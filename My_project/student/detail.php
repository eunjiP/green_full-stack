<?php
    include "db.php";

    $s_id = $_GET['s_id'];
    $conn = get_conn();
    $sql = "SELECT * FROM t_student WHERE s_id = $s_id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if($row = mysqli_fetch_assoc($result))
    {
        $s_id = $row['s_id'];
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
    <a href="main.html"><button>메인으로</button></a>
    <a href="list.php"><button>리스트</button></a>
    <a href="mod.php?s_id=<?=$s_id?>"><button>점수 등록/수정</button></a>
    <a href="del_proc.php?s_id=<?=$s_id?>"><button>학생 삭제</button></a>
    <div>학번 : <?=$s_id?></div>
    <div>이름 : <?=$s_name?></div>
    <br>
    <div>국어점수 : <?=$k_score?></div>
    <div>수학점수 : <?=$m_score?></div>
    <div>영어점수 : <?=$e_score?></div>
    <br>
    <?php
        $s_avg = s_avg($k_score, $m_score, $e_score);
        print "평균점수는 ${s_avg}점입니다.";
    ?>
</body>
</html>