<?php
    include "db.php";

    $book_id = $_GET['book_id'];
    $conn = get_conn();
    $sql = "SELECT title, author FROM t_books WHERE book_id = $book_id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if($row = mysqli_fetch_assoc($result))
    {
        $title = $row['title'];
        $author = $row['author'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자용-도서 수정</title>
    <style>
        body {text-align: center;}
        #main {border: 1px dotted #000;
            width: 40vw;
            margin-left:30vw;
            border-radius: 10px;
            line-height: 30px;}
        #button1,#button2 {margin-bottom:20px}
        #button1 {text-align:left;
            margin-left:30vw;}
    </style>
</head>
<body>
    <h1>도서 수정</h1>
    <div id="button1">
        <a href="book_list.php"><button>리스트</button></a>
        <a href="root_main.php"><button>메인</button></a>
    </div>
    <div id="main">
        <h4>😀수정 하실 책정보를 입력해주세요😀</h4>
        <form action="book_mod_proc.php" method="post">
            <input type="hidden" name="book_id" value="<?=$book_id?>">
            <div><input type="text" name="title" value="<?=$title?>"></div>
            <div><input type="text" name="author" value="<?=$author?>"></div>
            <div id="button2">
                <input type="submit" value="도서 수정">
                <input type="reset" value="초기화">
            </div>
        </form>
    </div>
</body>
</html>