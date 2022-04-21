<!-- 수입, 지출을 통합해서 볼 수 있는 리스트(내용이 많아졌을때 원하는 한달단위로 볼 수 있게 구현해보고 싶음...) -->
<?php
    include "db.php";

    $conn = get_conn();
    $sql = "SELECT num, in_out, item, create_at, money FROM income_spend 
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
        p {margin-left: 70vw;}
        table a {text-decoration: none;}
        table a:visited{ color:blue;}
        table a:hover {background: blue; color: #fff;}
        h1, #button {text-align: center;}
        span {font-weight: bold;}
        button {cursor:pointer;}
    </style>
</head>
<body>
    <h1>전체 리스트</h1>
    <div>
        <a href="main.php"><i class="fa-solid fa-house"></i></a>
        <div id=button>
            <a href="income_list.php"><button>수입 목록</button></a>
            <a href="spend_list.php"><button>지출 목록</button></a>
        </div>
    </div>
    <table>
        <tr>
            <th>수입/지출</th>
            <th>날짜</th>
            <th>항목</th>
            <th>금액</th>
        </tr>
        <?php
            $total = 0;
            while($row = mysqli_fetch_assoc($result))
            {
                $num = $row['num'];
                $in_out = $row['in_out'];
                $item = $row['item'];
                $create_at = $row['create_at'];
                $money = $row['money'];
                if($in_out == '수입') { 
                    $total += $money; }
                else { 
                    $total -= $money;}
                
                print "<tr>";
                print "<td>$in_out</td>";
                print "<td>$create_at</td>";
                print "<td><a href='detail.php?num=$num'>$item</a></td>";
                print "<td>" . number_format($money) . "</td>";
                print "</tr>";
            }
            $total = number_format($total);
        ?>
    </table>
    <p>총 합계 : <span><?=$total?></span>원</p>
</body>
</html>