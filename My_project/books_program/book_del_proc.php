<?php
    // 중복 선택된 책의 번호를 $_REQUEST를 이용하여 배열에 담아서 여러개 삭제가능
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