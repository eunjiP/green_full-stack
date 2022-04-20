<!-- 회원가입시에 중복되는 학번을 입력했을때 나오는 오류 페이지(아직 예외처리 수업전에 구현됨) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <title>학생 추가 오류</title>
    <style>
        body {line-height:30px; text-align: center;}
        span {color: #ff0000;}
    </style>
</head>
<body>
    <h1><span><i class="fa-solid fa-triangle-exclamation"></i></span>입력하셨던 학번은 
    <span>이미 등록</span>된 학번입니다<span><i class="fa-solid fa-triangle-exclamation"></i></span></h1>
    <div>
        <a href="singup.html"><button>다시입력</button></a>
        <a href="list.php"><button>학생리스트</button></a>
    </div>
</body>
</html>