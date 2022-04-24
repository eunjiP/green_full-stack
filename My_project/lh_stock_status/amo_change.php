<?php
    include "db.php";

    $item = $_GET['item'];
    $conn = get_conn();
    $sql = "SELECT * FROM mach_stock_status WHERE item = '$item' ORDER BY create_at";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    $conn = get_conn();
    $sql2 = "SELECT SUM(sto_amount), SUM(rel_amount) FROM mach_stock_status WHERE item = '$item'";
    $result2 = mysqli_query($conn, $sql2);
    mysqli_close($conn);
    if($row = mysqli_fetch_assoc($result2)) {
        $sum_sto = $row['SUM(sto_amount)'];
        $sum_rel = $row['SUM(rel_amount)'];
    }
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
    <h1><?=$item?> 상세 현황</h1>
        <a href="machine.php"><button>기계 재고 메뉴</button></a>
        <table>
            <tr>
                <th>품목</th>
                <th>품명</th>
                <th>입출사유 및 사용용도</th>
                <th>날짜</th>
                <th>입고 수량</th>
                <th>출고 수량</th>
                <th>재고변동량</th>
                <th>현재 재고량</th>
            </tr>
            <?php
                $hap = 0;
                while ($row2 = mysqli_fetch_assoc($result))
                {
                    $items = $row2['items'];
                    $cause = $row2['cause'];
                    $sto_rel = $row2['sto_rel'];
                    $sto_amount = $row2['sto_amount'];
                    $rel_amount = $row2['rel_amount'];
                    $create_at = $row2['create_at'];

                    print "<tr>";
                    print "<td>$items</td>";
                    print "<td>$item</td>";
                    print "<td>$cause</td>";
                    print "<td>$create_at</td>";
                    print "<td>$sto_amount</td>";
                    print "<td>$rel_amount</td>";
                    if($sto_amount !== null && $rel_amount == null) {
                        $hap += $sto_amount;
                        print "<td>$hap</td>";
                    }
                    elseif($sto_amount == null && $rel_amount !== null) {
                        $hap -= $rel_amount;
                        print "<td>$hap</td>";
                    }
                    print "<td>" . ($sum_sto - $sum_rel) . "</td>";
                    print "</tr>";
                }
            ?>
        </table>
</body>
</html>