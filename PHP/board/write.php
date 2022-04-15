<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글쓰기</title>
</head>
<body>
    <h1>글쓰기</h1>
    <a href="list.php"><button>리스트</button></a>
    <!-- <form action=목적지 method=방식> -->
    <!-- /board/write_proc.php과 board/write_proc.php 차이점(/차이)
    board/write_proc.php (/가 없으면) : 끝의 주소만 변경됨
    /board/write_proc.php(/가 있으면) : 다 지워지고 처음 위치부터 설정한다 -->
    <form action="/board/write_proc.php" method="post">
        <div><input type="text" name="title" placeholder="제목"></div>
        <div><textarea name="ctnt" placeholder="내용"></textarea></div>
        <div>
            <input type="submit" value="글등록">
            <input type="reset" value="초기화">
        </div>
    </form>
</body>
</html>