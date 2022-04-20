<!-- 회원가입시에 중복되는 학번을 입력했을때 나오는 오류 페이지(아직 예외처리 수업전에 구현됨) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>학생 추가 오류</title>
    <style>
        body {line-height:30px; text-align: center;}
        span {color: #ff0000; font-size: 2rem;}
    </style>
</head>
<body>
    <h4>입력하셨던 학번은 <span>이미 등록된 학번</span>입니다.</h4>
    <div>
        <a href="singup.html"><button>다시입력</button></a>
        <a href="list.php"><button>학생리스트</button></a>
    </div>
</body>
</html>