<!-- 로그인페이지 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>도서관리프로그램</title>
    <style>
        body {text-align: center;}
        body > div {border: 1px dotted #000;
            border-radius: 10px;}
        div > form{line-height: 30px;}
        div > div {margin: 10px;}
    </style>
</head>
<body>
    <div>
        <h1>도서관리프로그램</h1>
        <h4>이용자의 학번과 이름을 입력해주세요😀</h4>
        <form action="login_proc.php" method="post">
            <div><input type="text" name="id" placeholder="학번" required></div>
            <div><input type="text" name="lender" placeholder="이름" required></div>
            <input type="submit" value="로그인">
            <input type="reset" value="초기화">
        </form>
        <div>
            <div>처음 이용하시는 학생은 학생추가 후에 이용바랍니다!</div>
            <a href="singup.html"><button>학생추가</button></a>
            <a href="list.php"><button>학생리스트</button></a>
        </div>
    </div>
</body>
</html>