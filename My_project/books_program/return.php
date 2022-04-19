<!-- 로그인한 아이디로 대여중인 책만 표시해서 보여준다 -->
<?php
    $id = $_GET['id'];
    
    include "db.php";
    $conn = get_conn();
    $sql = "SELECT title, book_id FROM t_books WHERE lender_id = $id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>도서관리프로그램</title>
</head>
<body>
    <h1>대여한 리스트</h1>
    <h4>반납원하시는 책을 선택해주세요</h4>
    <a href="main.php?id=<?=$id?>"><button>메인으로</button></a>
    <form action="return_proc.php" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        <?php
            while($row = mysqli_fetch_assoc($result))
            {
                $title = $row['title'];
                $book_id = $row['book_id'];

                print "<div><input type='radio' name='book_id' value='$book_id'>$title</div>";
            }
        ?>
        <input type="submit" value="선택한 책 반납">
        <input type="reset" value="초기화">
    </form>
</body>
</html>