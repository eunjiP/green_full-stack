<?php
    //원하는 책 체크후 대여버튼 누를시에 데이터베이스에 대여자 학번 전달
    include_once "db.php";
    $id = $_POST['id'];
    $book_id = $_REQUEST['book_id'];

    for ($i=0; $i < count($book_id); $i++) { 
        $conn = get_conn();
        $sql = "UPDATE t_books set lender_id = $id WHERE book_id = $book_id[$i]";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
    header("Location: main.php");
?>

