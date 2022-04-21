<!-- 수입등록 할 수 있는 페이지 -->
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
        .cursor {cursor:pointer;}
    </style>
</head>
<body>
    <h1>수입 등록</h1>
    <div id='main'>
        <a href="main.php"><i class="fa-solid fa-house"></i></a>
        <form action="income_proc.php" method="post">
            <input type="hidden" name="in_out" value="수입">
            <input type="hidden" name="method" value="cash">
            <div>날짜 : <input type="date" name="create_at" require></div>
            <div>항목 : 
                <select name="item">
                    <option value="월급">월급</option>
                    <option value="부수입">부수입</option>
                    <option value="적금만기/이자">적금만기/이자</option>
                </select>
            </div>
            <div>금액 : <input type="number" name="money" require placeholder="금액"></div>
            <div><textarea name="memo" cols="30" rows="5" placeholder="메모"></textarea></div>
            <input class='cursor' type="submit" value="등록">
            <input class='cursor' type="reset" value="초기화">
        </form>
    </div>
</body>
</html>