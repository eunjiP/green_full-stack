<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>학생관리프로그램</title>
    <style>
        form {line-height: 28px;}
    </style>
</head>
<body>
    <h1>학생관리</h1>
    <a href="list.php"><button>학생리스트</button></a>
    <form action="sging_proc.php" method="post">
        <div><input type="text" name="s_id" require placeholder="학번"></div>
        <div><input type="text" name="s_name" require placeholder="이름"></div>
        <input type="submit" value="등록">
        <input type="reset" value="초기화">
    </form>
</body>
</html>