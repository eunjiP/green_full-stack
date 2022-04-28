<?php
    //detail페이지 구현 및 db_board에 sel_board 함수를 구현하세요
    include_once "db/db_board.php";
    session_start();
    $login_user = $_SESSION["login_user"];
    $i_user = $login_user["i_user"];

    $i_board = $_GET['i_board'];
    $param = [
        "i_board" => $i_board
    ];
    $result = sel_board($param);
    //결과같이 없으면(list에서 넘겨준 i_board값이 없다는 말) 에러창으로 이동
    if(!isset($result)) {
        header("Location: error.php");
    }

    $title = sel_board($param)['title'];
    $nm = sel_board($param)['nm'];
    $created_at = sel_board($param)['created_at'];
    $ctnt = sel_board($param)['ctnt'];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>
    <div><a href="list.php">리스트</a></div>
    <div>
        <a href="detail.php">이전글</a>
        <a href="detail.php?i_board=<?=next_board($param)[i_board]?>">다음글</a>
    </div>
    <?php if( $i_user === $result['i_user'] ) { ?>
    <div>
        <a href="mod.php"><button>수정</button></a>
        <a href="del.php"><button>삭제</button></a>
    </div>
    <?php } ?>
    <div>제목 : <?=$title?></div>
    <div>글쓴이 : <?=$nm?></div>
    <div>등록일시 : <?=$created_at?></div>
    <div>내용 : <?=$ctnt?></div>
</body>
</html>
        <!-- 해당 글 쓴 사람만 나타나도록 처리
        (nm으로 하게되면 동명이인일 경우 작동될 수 있다) --> 