<?php
    include_once "db.php";  //db와 연결하려면 항상 필요함
    // include_once : include를 여러번 적어도 한번만 적용
    // include : include힐때마다 가져온다(하단의 예시 참고)
    
    $i_board = $_GET['i_board'];
    // print "i_board : $i_board <br>";    //값을 잘 받았는지 확인
    $sql = "SELECT * FROM t_board WHERE i_board = $i_board";

    $conn = get_conn();
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if($row = mysqli_fetch_assoc($result))  //pk를 where절에 넣게 되면 경우의 수가 0 또는 1이므로 if문 사용가능하다(만약 여러개라면 while문)
    {
        $title = $row['title'];
        $ctnt = $row['ctnt'];
        $create_at = $row['create_at'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <a href="list.php"><button>리스트</button></a>
    <a href="del_proc.php?i_board=<?= $i_board ?>"><button>삭제</button></a>
    <a href="mod.php?i_board=<?= $i_board ?>"><button>수정</button></a>
    <div>제목 : <?= $title ?></div>
    <div>작성일시 : <?= $create_at ?></div>
    <div>내용 : <?= $ctnt ?></div>
</body>
</html>
<!-- URL부분은 전부 붙여서 사용!!공백 있으면 안됨
    삭제 또한 찾을때처럼 어떤 레코드를 삭제할지 정해줘야한다(a태그 활용) -->
<!-- <?= 변수명 ?> : html안에서 변수명 넣을때(출력 축약형/php 축약태그) -->
<!-- <?php include_once 'hello.php'; ?>
<?php include_once 'hello.php'; ?>  
        여러번 적어도 한개만 적용
    <?php include 'hello.php'; ?>
    <?php include 'hello.php'; ?>
        적은 수만큼 적용 -->