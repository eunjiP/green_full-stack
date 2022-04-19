<?php
    include "db.php";

    $conn = get_conn();
    $sql = "SELECT * FROM members ORDER BY lender";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>학생 리스트</title>
    <style>
        body { margin: 30px}
        div {margin: 10px 0}
        table {border: 1px solid #000;
            border-collapse: collapse;
            width: 20rem;}
        th, td {border: 1px dotted #000;
            text-align: center;}
    </style>
</head>
<body>
    <h1>현재까지 등록된 학생 리스트</h1>
    <div>
        <a href="login.php"><button>로그인</button></a>
        <a href="singup.html"><button>학생추가</button></a>
    </div>
    <table>
        <tr>
            <th>학번</th>
            <th>이름</th>
        </tr>
        <?php
            $count = 0;
            while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $lender = $row['lender'];

                print "<tr>";
                print "<td>$id</td>";
                print "<td>$lender</td>";
                print "</tr>";
                $count++;
            }
        ?>
    </table>
    <div>총 학생의 수는 <?=$count?>명 입니다.</div>
</body>
</html>