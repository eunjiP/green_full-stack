<!-- 수입내용만 있는 리스트(달력으로 원하는 날짜를 선택해서 구현해보고싶음...) -->
<?php
    include "db.php";

    $conn = get_conn();
    $sql = "SELECT item, create_at, money FROM income_spend
    WHERE in_out = '수입'
    ORDER BY create_at";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <title>가계부</title>
    <style>
        table {width:100%;}
        i { color:#000; font-size:1.5rem;}
        h1, #button {text-align: center;}
        button {cursor:pointer;}
    </style>
</head>
<body>
    <h1>수입 목록</h1>
    <a href="main.php"><i class="fa-solid fa-house"></i></a>
    <div id='button'>
        <a href="list.php"><button>전체리스트</button></a>
        <a href="spend_list.php"><button>지출리스트</button></a>
    </div>
    <table>
        <tr>
            <th>날짜</th>
            <th>항목</th>
            <th>금액</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result))
            {
                $item = $row['item'];
                $create_at = $row['create_at'];
                $money = $row['money'];
                
                print "<tr>";
                print "<td>$create_at</td>";
                print "<td>$item</td>";
                print "<td>" . number_format($money) . "</td>";
                print "</tr>";
            }
        ?>
    </table>
</body>
</html>