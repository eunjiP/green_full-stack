<?php
    include "db.php";

    $conn = get_conn();
    $sql = "SELECT s_id, s_name, create_at FROM t_student ORDER BY s_id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
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
    <h1>학생 리스트</h1>
    <a href="main.html"><button>메인으로</button></a>
    <a href="sging_up.php"><button>학생등록</button></a>
    <table>
        <tr>
            <th>학번</th>
            <th>이름</th>
            <th>등록일</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result))
            {
                $s_id = $row['s_id'];
                $s_name = $row['s_name'];
                $create_at = $row['create_at'];

                print "<tr>";
                print "<td>$s_id</td>";
                print "<td><a href='detail.php?s_id=$s_id'>$s_name</td>";
                print "<td>$create_at</td>";
                print "</tr>";
            }
        ?>
    </table>
</body>
</html>