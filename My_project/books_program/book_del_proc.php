<?php
    include "db.php";

    $book_id = $_REQUEST['book_id'];
    
    for ($i=0; $i < count($book_id) ; $i++) { 
        $conn = get_conn();
        $sql = "DELETE FROM t_books WHERE book_id = $book_id[$i]";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
    
    header("Location: book_del.php");
?>