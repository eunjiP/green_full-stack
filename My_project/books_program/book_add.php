<!-- 관리자가 책을 추가할때 보이는 페이지 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <title>관리자용-도서추가</title>
    <style>
        body {text-align: center;}
        i {font-size:1.5rem; color:#000}
        #main {border: 1px dotted #000;
            border-radius: 10px;
            width: 40vw;
            margin-left:30vw}
        form {line-height: 30px;}
        #button1 {text-align:left;margin-left:30vw;}
        #button1, #button2 {margin-bottom: 10px}
        .cursor {cursor:pointer;}
    </style>
</head>
<body>
    <h1>도서 추가</h1>
    <div id="button1"><a href="root_main.php"><i class="fa-solid fa-house"></i></a></div>
    <div id="main">
        <h4>추가 하실 책을 입력해주세요😀</h4>
        <form action="book_add_proc.php" method="post">
            <div><input type="text" name="title" placeholder="책 제목"></div>
            <div><input type="text" name="author" placeholder="책 저자"></div>
            <div id="button2">
                <input class='cursor' type="submit" value="도서 등록">
                <input class='cursor' type="reset" value="초기화">
            </div>
        </form>
    </div>
</body>
</html>