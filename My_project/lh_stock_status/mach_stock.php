<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LH 재고 관리 현황</title>
</head>
<body>
    <h1>입고 등록</h1>
    <a href="machine.php"><button>기계 재고 메뉴</button></a>
    <form action="sto_rel_proc.php" method="post">
        <input type="hidden" name="sto_rel" value="입고">
        <div>입고 날짜 : <input type="date" name="create_at" require></div>
        <div><input type="text" name="items" placeholder="품명" require></div>
        <div><input type="text" name="cause" placeholder="입고사유" require></div>
        <div><input type="text" name="item" placeholder="품명" require></div>
        <div><input type="number" name="amount" placeholder="수량" require></div>
        <input type="submit" value="등록">
        <input type="reset" value="초기화">
    </form>
</body>
</html>