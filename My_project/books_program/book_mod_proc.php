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