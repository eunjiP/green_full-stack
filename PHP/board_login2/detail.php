<?php
    include_once "db/db_board.php";

    session_start();
    $login_user = $_SESSION['login_user'];
    $writer = $login_user['i_user'];
    $i_board = $_GET['i_board'];
    $param = [
        'i_board' => $i_board
    ];
    // $result = sel_board($param);
    // foreach($result as $item) {
    //     $title = $item['title'];
    //     $nm = $item['nm'];
    //     $created_at = $item['created_at'];
    //     $ctnt = $item['ctnt'];
    //     $i_user = $item['i_user'];
    // }

    //함수해서 한줄이 아닌 배열로 보내면 함수 선언하면서 값을 바로 담을 수 있다(값이 한줄일 경우에만)
    $title = sel_board($param)['title'];
    $nm = sel_board($param)['nm'];
    $created_at = sel_board($param)['created_at'];
    $ctnt = sel_board($param)['ctnt'];
    $next_board = sel_next_board($param);
    $prev_board = sel_prev_board($param);
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
        <?php if($prev_board !== 0) {?>
            <a href="detail.php?i_board=<?=$prev_board?>"><button>이전글</button></a>
        <?php } ?>
        <?php if($next_board !== 0) {?>
            <a href="detail.php?i_board=<?=$next_board?>"><button>다음글</button></a>
        <?php } ?>
    </div>
    <div>
        <!-- 해당 글 쓴 사람만 나타나도록 처리
        (nm으로 하게되면 동명이인일 경우 작동될 수 있다) -->
        <?php if($writer === sel_board($param)['i_user']) { ?>
            <a href="mod.php?i_board=<?=$i_board?>"><button>수정</button></a>
            <button onclick="isDel();">삭제</button>
        <?php } ?>        
    </div>
    <div>제목 : <?=$title?></div>
    <div>글쓴이 : <?=$nm?></div>
    <div>등록일시 : <?=$created_at?></div>
    <div>내용 : <?=$ctnt?></div>
    <!-- 간단하면 태그로 바로 써도 되지만 되도록 인포트해서 사용하는게 유지보수에 좋다 -->
    <script>
        function isDel() {
            console.log('isDel 실행 됨!!');
            //상수가 가능한게 실행되고 나서는 변하지 않는값
            //새로 호출 후에 변경되는거와는 다른 개념
            if(confirm('삭제하시겠습니까?')) {
                location.href = "del.php?i_board=<?=$i_board?>";
            }
        }
    </script>
</body>
</html>