<!-- 가계부 목록에서 항목클릭시에 연결되는 페이지, 리스트에서 보이지않는 메모나 수단을 볼 수 있다 -->
<?php
    include "db.php";

    $num = $_GET['num'];
    $conn = get_conn();
    $sql = "SELECT * FROM income_spend 
    WHERE num = $num";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if($row = mysqli_fetch_assoc($result))
    {
        $in_out = $row['in_out'];
        $item = $row['item'];
        $create_at = $row['create_at'];
        $money = $row['money'];
        $method = $row['method'];
        $memo = $row['memo'];

        $money = number_format($money);
    }
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
        i { color:#000; font-size:1.5rem;}
        h1, #button {text-align: center;}
        #main { margin-left:40vw;
            width:30vw}
        button {cursor:pointer;}
    </style>
</head>
<body>
    <h1>상세 내용</h1>
    <a href="main.php"><i class="fa-solid fa-house"></i></a>
    <div id='button'>
        <a href="list.php"><button>리스트</button></a>
        <a href="mod.php?num=<?=$num?>"><button>수정</button></a>
        <a href="del_proc.php?num=<?=$num?>"><button>삭제</button></a>
    </div>
    <div id='main'>
        <h4><?=$in_out?></h4>
        <div>날짜 : <?=$create_at?></div>
        <div>금액 : <?=$money?></div>
        <?php
            if($in_out !== '수입') { print "<div>수단 : $method</div>"; }
            if($memo !== "" ) { print "<div>메모 : $memo</div>"; }
        ?>
    </div>
</body>
</html>