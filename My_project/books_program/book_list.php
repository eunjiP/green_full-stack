<!-- 관리자용 책리스트이고 제목을 클릭시에 책의 정보를 수정도 가능하다 -->
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
    <title>관리자용-책 리스트</title>
    <style>
        i {font-size:1.5rem; color:#000}
        a { text-decoration: none;}
        table {width:100%;}
        h1{text-align: center;}
        button {margin-bottom:10px}
        table a:visited, table a:link {color:#000;}
        table a:hover { background-color: #000;
            color: #fff;}
    </style>
</head>
<body>
    <h1>현재 등록된 책의 목록</h1>
    <a href="root_main.php"><i class="fa-solid fa-house"></i></a>
    <a href="book_list_lent.php"><button>대여중인 도서현황</button></a>
    <table>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>저자</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result))
            {
                $book_id = $row['book_id'];
                $title = $row['title'];
                $author = $row['author'];
            
                print "<tr>";
                print "<td>$book_id</td>";
                print "<td><a href='book_mod.php?book_id=$book_id'>$title</a></td>";
                print "<td>$author</td>";
                print "</tr>";
            }
        ?>
    </table>
</body>
</html>
