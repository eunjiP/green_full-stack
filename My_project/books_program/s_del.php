<?php
     include "db.php";

     $conn = get_conn();
     $sql = "SELECT * FROM members";
     $result = mysqli_query($conn, $sql);
     mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자용-학생삭제</title>
    <style>
        .list {text-align:left;
            width: 30vw;
            margin-left:30vw}
        .button {margin-top: 10px}
        body {margin:50px;
            width: 80vw;
            text-align: center;}
        body button {margin-bottom: 10px}
        span {color:#ff0000}
        
    </style>
</head>
<body>
    <h1>학생계정 삭제</h1>
    <h4>삭제된 정보는 복구가 <span>불가능</span>하므로 신중히 사용부탁드립니다.</h4>
    <a href="root_main.php"><button>메인</button></a>
    <form action="s_del_proc.php" method="post">
    <div class="list">
    <?php
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id'];
            $lender = $row['lender'];

            print "<div><input type='checkbox' name='id[]' value='$id'>$lender($id)</div>";
        }
    ?>
    </div>
    <div class="button">
        <input type="submit" value="삭제">
        <input type="reset" value="초기화">
    </div>
    </form>
</body>
</html>