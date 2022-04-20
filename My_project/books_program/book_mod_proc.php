<!-- 관리자가 책의 정보를 수정시 데이터베이스에 연결해서 내용 수정해주는 php -->
<?php
    include "db.php";

    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];

    $conn = get_conn();
    $sql = "UPDATE t_books SET title = '$title', author = '$author' 
    WHERE book_id = $book_id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: book_list.php");
?>