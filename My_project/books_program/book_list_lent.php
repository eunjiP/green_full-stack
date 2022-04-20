<?php
    include "db.php";
    
    $conn = get_conn();
    $sql = "SELECT A.book_id, A.title, A.author, A.lender_id, B.lender 
    FROM t_books A 
    INNER JOIN members B
    ON A.lender_id = B.id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자용-책 대여현황</title>
    <style>
        table {width:100%}
        span {color:red; font-weight: bold;
            font-size: 1.3rem;}
        .center {text-align: center;
            margin: 20px 0}
    </style>
</head>
<body>
    <h1 class="center">현재 대여중인 책의 목록</h1>
    <a href="root_main.php"><button>메인</button></a>
    <a href="book_list.php"><button>전체 리스트</button></a>
    <table>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>저자</th>
            <th>대여자</th>
        </tr>
        <?php
            $count = 0;
            while($row = mysqli_fetch_assoc($result))
            {
                $book_id = $row['book_id'];
                $title = $row['title'];
                $author = $row['author'];
                $lender_id = $row['lender_id'];
                $name = $row['lender'];

                print "<td>$book_id</td>";
                print "<td>$title</td>";
                print "<td>$author</td>";
                if($lender_id !== null || $lender_id !== 0)
                {
                    print "<td>${name}님이 대여중</td>";
                    $count++;
                }
                print "<tr>";
            }
        ?>
    </table>
    <div class="center">현재 대여중인 책은 총 <span><?=$count?>권</span>입니다.</div>
</body>
</html>