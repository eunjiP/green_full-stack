<!-- 현재 등록되어있는 책의 전체 목록을 확인할 수 있다 -->
<?php
    include "db.php";
        
    $id = $_GET['id'];
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
    <title>도서관리프로그램</title>
    <style>
        body { margin: 50px;}
        div {margin-bottom: 10px}
        h1 {text-align: center;}
        table {border: 2px solid #000;
            border-collapse: collapse;
            width: 90vw;
            height: 70vh;}
        th, td {border: 1px dotted #000;
            text-align: center;}
        th {border-bottom:2px solid #000;}
    </style>
</head>
<body>
    <h1>현재 등록되어 있는 책의 목록</h1>
    <div><a href="main.php?id=<?=$id?>"><button>메인으로</button></a></div>
    <table>
        <tr>
            <th>제목</th>
            <th>저자</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result))
            {
                $title = $row['title'];
                $author = $row['author'];
            
                print "<tr>";
                print "<td>$title</td>";
                print "<td>$author</td>";
                print "</tr>";
            }
        ?>
    </table>
</body>
</html>