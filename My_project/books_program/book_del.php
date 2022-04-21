<!-- 관리자가 책 삭제할때 쓰는 페이지로 복수 선택 가능하도록 checkbox사용함 -->
<?php
    include "db.php";
    
    $conn = get_conn();
    $sql = "SELECT book_id, title, author FROM t_books";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <title>관리자용-도서 삭제</title>
    <style>
        i {font-size:1.5rem; color:#000}
        h1, #button2 {text-align: center;}
        #button1 {text-align:left;}
        #button1, #button2 {margin: 10px 0;}
    </style>
</head>
<body>
    <h1>삭제하실 도서를 선택해주세요</h1>
    <div id="button1"><a href="root_main.php"><i class="fa-solid fa-house"></i></a></div>
    <form action="book_del_proc.php" method="post">
        <?php
            while($row = mysqli_fetch_assoc($result))
            {
                $book_id = $row['book_id'];
                $title = $row['title'];
                $author = $row['author'];
                print "<div><label><input type='checkbox' name='book_id[]' value='$book_id'>$title / $author</label></div>";
            }
        ?>
        <div id="button2">
            <input type="submit" value="삭제">
            <input type="reset" value="초기화">
        </div>
    </form>
</body>
</html>
