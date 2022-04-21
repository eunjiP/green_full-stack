<!-- 가계부 프로그램의 메인화면으로 추후 찾기 기능, 계정별관리 등 추가 구현해보고 싶음 -->
<!-- 
보완점 
-수입/지출 등록시 한 페이지에서 등록가능하게 구현
-내용수정시에 수입내용이라 적었지만 지출로 내용 그대로 변경 가능하도록 구현
-사용자가 원하는 항목을 추가할 수 있도록 구현
-로그인을 적용해서 여러사람이 사용가능하고 보안적인 부분도 추가
-아직은 홈페이지 느낌이 부족해보임.... 
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <title>가계부</title>
    <style>
        body {text-align: center;}
        h1 > i {color: green; font-size: 3rem;}
        h4 > i {color: orange;}
        #main {border: 1px dotted #000;
            border-radius: 10px;
            width: 40vw;
            margin-left:30vw}
        .button {margin-bottom: 20px}
        button {cursor:pointer;}
    </style>
</head>
<body>
    <h1><i class="fa-solid fa-sack-dollar"></i>가계부 프로그램<i class="fa-solid fa-sack-dollar"></i></h1>
    <div id="main">
    <h4><i class="fa-solid fa-coins"></i>티끌모아 태산<i class="fa-solid fa-coins"></i></h4>
        <div class="button"><a href="income.php"><button>수입 등록</button></a></div>
        <div class="button"><a href="spend.php"><button>지출 등록</button></a></div>
        <div class="button"><a href="list.php"><button>목록 보기</button></a></div>
    </div>
</body>
</html>