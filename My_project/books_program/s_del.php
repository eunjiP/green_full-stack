<!-- 관리자가 어떤 학생을 삭제할 것인지 선택하는 페이지(checkbox사용으로 중복체크가능) -->
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
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <title>관리자용-학생삭제</title>
    <style>
        i {font-size:1.5rem; color:#000}
        #home {padding-bottom: 10px}
        .list {text-align:left;
            width: 30vw;
            margin-left:30vw}
        .button {margin-top: 10px}
        body {margin:50px;
            width: 80vw;
            text-align: center;}
        body button {margin-bottom: 10px}
        span {color:#ff0000}
        .cursor {cursor:pointer;}
    </style>
</head>
<body>
    <h1>학생계정 삭제</h1>
    <h4>삭제된 정보는 복구가 <span>불가능</span>하므로 신중히 사용부탁드립니다.</h4>
    <div id="home"><a href="root_main.php"><i class="fa-solid fa-house"></i></a></div>
    <form action="s_del_proc.php" method="post">
    <div class="list">
    <?php
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id'];
            $lender = $row['lender'];

            print "<div><label><input type='checkbox' name='id[]' value='$id'>$lender($id)</label></div>";
        }
    ?>
    </div>
    <div class="button">
        <input class='cursor' type="submit" value="삭제">
        <input class='cursor' type="reset" value="초기화">
    </div>
    </form>
</body>
</html>