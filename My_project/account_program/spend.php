<!-- 지출 등록 하는 페이지 -->
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
    <h1>지출 등록</h1>
    <div id='main'>
        <a href="main.php"><i class="fa-solid fa-house"></i></a>
        <form action="income_proc.php" method="post">
            <input type="hidden" name="in_out" value="지출">
            <div>날짜 : <input type="date" name="create_at" require></div>
            <div>항목 : 
                <select name="item">
                    <option value="금융/보험">금융/보험</option>
                    <option value="학습/교육">학습/교육</option>
                    <option value="경조사/회비">경조사/회비</option>
                    <option value="주거/통신">주거/통신</option>
                    <option value="생활/마트">생활/마트</option>
                    <option value="의료/건강">의료/건강</option>
                    <option value="뷰티/미용">뷰티/미용</option>
                    <option value="외식" selected>외식</option>
                    <option value="교통/차량">교통/차량</option>
                    <option value="백화점/패션">백화점/패션</option>
                    <option value="문화/예술">문화/예술</option>
                </select>
            </div>
            <div>수단 : 
                <label><input type="radio" name="method" value="현금" checked>현금</label>
                <label><input type="radio" name="method" value="체크카드">체크카드</label>
                <label><input type="radio" name="method" value="신용카드">신용카드</label>
            </div>
            <div>금액 : <input type="number" name="money" require placeholder="금액"></div>
            <div><textarea name="memo" cols="30" rows="5" placeholder="메모"></textarea></div>
            <input class='cursor' type="submit" value="등록">
            <input class='cursor' type="reset" value="초기화">
        </form>
    </div>
</body>
</html>