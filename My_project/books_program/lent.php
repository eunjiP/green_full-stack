<?php
    // 대여페이지 구현
    $id = $_GET['id'];

    include "db.php";

    $conn = get_conn();
    $sql = "SELECT * FROM t_books ORDER BY book_id";
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
    <style>
        body { text-align: center;}
        button {margin-bottom: 10px;}
        #check {text-align:left;
            margin-left: 30vw;}
        #button {margin-top: 10px;}
    </style>
    
</head>
<body>
    <h1>도서 대여</h1>
    <a href="main.php?id=<?=$id?>"><button>메인으로</button></a>
    <form action="lent_proc.php" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        <div id="check">
            <?php
                while($row = mysqli_fetch_assoc($result))
                {
                    $title = $row['title'];
                    $book_id = $row['book_id'];
                    $lender_id = $row['lender_id'];

                    if($lender_id == null) { print "<div><input type='checkbox' name='book_id[]' value='$book_id'>$title</div>"; }
                    else { continue; }
                }
            ?>
        </div>
        <div id="button">
            <input type="submit" value="선택 항목 대여">
            <input type="reset" value="초기화">
        </div>
    </form>
</body>
</html>