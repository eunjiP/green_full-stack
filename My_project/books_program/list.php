<!-- 학생 리스트 화면으로 학생과 관리자 모두 이 페이지에서 목록확인 -->
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
        body { text-align: center;}
        #button {margin-bottom: 10px}
        table {border: 2px solid #000;
            border-collapse: collapse;
            width: 40vw;
            margin-left: 28vw}
        th, td {border: 1px dotted #000;
            text-align: center;}
        th {border-bottom:2px solid #000;}
        #footer {margin-top: 10px}
        span {font-weight: bolder;
            font-size:1.3rem}
    </style>
</head>
<body>
    <h1>현재까지 등록된 학생 리스트</h1>
    <div id="button">
        <a href="login.php"><button>로그인</button></a>
        <a href="singup.html"><button>가입하기</button></a>
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
    <div id="footer">총 학생의 수는 <span><?=$count?>명</span>입니다.</div>
</body>
</html>