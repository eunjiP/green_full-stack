<?php
    //CSS와 PHP가 연결이 안되면 강제 새로고침을 해주어야함!
    //사이트에사 Ctrl + F5

    include_once "db/db_board.php";
    session_start();
    $nm = "";
    $page = 1;
    //만약 쿼리스트링이 없으면 첫페이지를 볼수 있게 처리
    if(isset($_GET['page'])) { $page = intval($_GET['page']);}
    // print "page : " . $page;
    if(isset($_SESSION['login_user'])) {
        $login_user = $_SESSION['login_user'];
        $nm = $login_user['nm'];
    }
    $row_count = 20;
    $param = [
        'row_count' => 20,
        'start_idx' => ($page-1) * $row_count
    ];
    $paging_count = sel_paging_count($param);
    $result = sel_board_list($param);
    
    //검색버튼을 눌렀거나, 검색어가 존재한다면
    if(isset($_POST['search_input_txt']) && $_POST['search_input_txt'] != "") {
        $param += [
            "search_select" => $_POST["search_select"], //select박스 value값
            "search_input_txt" => $_POST["search_input_txt"]    //검색어
        ];
        //DB조회 전달 수 결과 list를 받아온다.
        $result = search_board($param);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common.css">
    <title>리스트</title>
</head>
<body>
    <div id="container">
        <header>
            <?php
            if(isset($_SESSION['login_user'])) {
                print "<div>${nm}님 환영합니다.</div>";
            }
            ?>
            <div>
                <a href="list.php">리스트</a>
            <?php
                if(isset($_SESSION['login_user'])) { ?>
                    <a href='write.php'>글쓰기</a>
                    <a href='logout.php'>로그아웃</a>
                <?php }
                else { ?>
                    <a href='login.php'>로그인</a>
                <?php }
            ?>
            </div>
        </header>
        <main>
            <h1>리스트</h1>
            <!-- 글번호, 제목, 작성자명, 등록일시(테이블형식) -->
            <table>
                <tr>
                    <th>글번호</th>
                    <th>제목</th>
                    <th>작성자명</th>
                    <th>등록일시</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_assoc($result)) {
                        $i_board = $row['i_board'];
                        $title = $row['title'];
                        $nm = $row['nm'];
                        $created_at = $row['created_at'];

                        print "<tr>";
                        print "<td>$i_board</td>";
                        print "<td><a href='detail.php?i_board=$i_board'>$title</a></td>";
                        print "<td>$nm</td>";
                        print "<td>$created_at</td>";
                        print "</tr>";
                    }
                ?>
                <!-- <?php //foreach문을 사용하는 방법
                    foreach ($result as $item) { ?>
                    <tr>
                        <td><?=$item['i_board']?></td>
                        <td><a href="detail.php?i_board=<?=$item['i_board']?>"><?=$item['title']?></a></td>
                        <td><?=$item['nm']?></td>
                        <td><?=$item['created_at']?></td>
                    </tr>
                <?php } ?> -->
            </table>
            <div>
                <?php for ($i=1 ; $i<= $paging_count ; $i++) { ?>
                    <span class="<?=$i===$page ? 'pageSelected' : ''?>">
                    <a href="list.php?page=<?=$i?>"><?=$i?></a>
                    </span>
                <?php } ?>
            </div>
            <form method="POST" action="list.php">
                <div>
                    <select name="search_select">
                        <option value="search_writer">작성자</option>
                        <option value="search_title">제목</option>
                        <option value="search_ctnt">제목+내용</option>
                    </select>
                    <div>
                        <input type="text" name="search_input_txt">
                        <input type="submit" value="검색">
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>
</html>