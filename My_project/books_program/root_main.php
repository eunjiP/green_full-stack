<!-- 관리자로 정상로그인 시에 보이는 화면
 (주소창에 root_main이라고 치면 들어갈수 있어서 보안적이지는 못함...) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>도서관리프로그램-관리자용</title>
    <style>
        body {text-align: center;}
        #main {border:1px dotted #000;
            border-radius: 10px;
            padding-bottom:30px}
        #footer {margin-top: 10px}
        button {cursor:pointer;}
    </style>
</head>
<body>
    <h1>관리자님 안녕하세요</h1>
    <div id="main">
        <h4>😀원하시는 메뉴를 선택해주세요😀</h4>
        <a href="book_list.php"><button>책 전체 리스트</button></a>
        <a href="book_add.php"><button>책 추가</button></a>
        <a href="book_del.php"><button>책 삭제</button></a>
        <a href="s_del.php"><button>학생 삭제</button></a>
    </div>
    <div id="footer"><a href="login.php"><button>도서관리 로그인창으로 이동</button></a></div>
</body>
</html>