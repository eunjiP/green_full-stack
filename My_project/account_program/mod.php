<!-- pk값으로 수입내용 수정이라면 해당 페이지가 보이고 지출내용 수정이면 페이지 이동하게 구현 -->
<?php
    include "db.php";

    $num = $_GET['num'];
    $conn = get_conn();
    $sql = "SELECT * FROM income_spend WHERE num = $num";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if($row = mysqli_fetch_assoc($result))
    {
        $in_out = $row['in_out'];
        if($in_out == '지출') { header("Location: mod_spend.php?num=$num");}
        $item = $row['item'];
        $create_at = $row['create_at'];
        $money = $row['money'];
        $memo = $row['memo'];
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
        h1 {text-align: center;}
        i { color:#000; font-size:1.5rem;}
        #main { margin-left: 35vw;
            line-height: 35px;}
        button, .cursor {cursor:pointer;}
    </style>
</head>
<body>
    <h1>내용 수정</h1>
    <div id='main'>
        <a href="main.php"><i class="fa-solid fa-house"></i></a>
        <a href="detail.php?num=<?=$num?>"><button>뒤로가기</button></a>
        <form action="mod_proc.php" method="post">
            <input type="hidden" name="num" value="<?=$num?>">
            <input type="hidden" name="in_out" value="<?=$in_out?>">
            <div>날짜 : <input type="date" name="create_at" require value='<?=$create_at?>'></div>
            <div>항목 : 
                <select name="item">
                    <option value="월급">월급</option>
                    <option value="부수입">부수입</option>
                    <option value="적금만기/이자">적금만기/이자</option>
                </select>
            </div>
            <div>금액 : <input type="number" name="money" require value=<?=$money?>></div>
            <div><textarea name="memo" cols="30" rows="5" placeholder="메모"><?=$memo?></textarea></div>
            <input class='cursor' type="submit" value="수정">
            <input class='cursor' type="reset" value="초기화">
        </form>
    </div>
</body>
</html>