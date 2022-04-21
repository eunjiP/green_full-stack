<!-- 중복되는 책을 추가시에 뜨는 에러 페이지 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <title>도서 추가 에러</title>
    <style>
        body {text-align: center;}
        #red {color:red;}
        .blue {color:blue;}
    </style>
</head>
<body>
    <h1><span id="red"><i class="fa-solid fa-triangle-exclamation"></i></span>입력한 <span class="blue">제목</span>과 <span class="blue">저자</span>는 
        <span id="red">이미 등록</span>되어있습니다<span id="red"><i class="fa-solid fa-triangle-exclamation"></i></span></h1>
    <h4>리스트 확인 후에 재시도 부탁드립니다!</h4>
    <a href="root_main.php"><button>메인</button></a>
    <a href="book_list.php"><button>도서 리스트</button></a>
</body>
</html>