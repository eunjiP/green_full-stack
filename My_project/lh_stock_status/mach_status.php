<?php
    include "db.php";

    $conn = get_conn();
    $sql = "SELECT *, SUM(sto_amount), SUM(rel_amount) FROM mach_stock_status
    GROUP BY item, items";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LH 재고 관리 현황</title>
    <style>
        table {width:100%; text-align: center;}
    </style>
</head>
<body>
    <h1>기계 재고 현황</h1>
    <a href="machine.php"><button>기계 재고 메뉴</button></a>
    <table>
        <tr>
            <th>품목</th>
            <th>품명</th>
            <th>마지막 수정날짜 날짜</th>
            <th>현재 재고량</th>
        </tr>
        <?php
            while ($row = mysqli_fetch_assoc($result))
            {
                $items = $row['items'];
                $cause = $row['cause'];
                $item = $row['item'];
                $sto_rel = $row['sto_rel'];
                $sto_amount = $row['SUM(sto_amount)'];
                $rel_amount = $row['SUM(rel_amount)'];
                $create_at = $row['create_at'];

                print "<tr>";
                print "<td><a href='items_list.php?items=$items'>$items</td>";
                print "<td><a href='amo_change.php?item=$item'>$item</a></td>";
                print "<td>$create_at</td>";
                print "<td>" . ($sto_amount - $rel_amount) . "</td>";
                print "</tr>";
            }
        ?>
    </table>
</body>
</html>