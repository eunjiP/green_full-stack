<?php
    include_once "db.php";   //include:다른 파일에 정의한 함수를 불러올 수 잇다.
        //include_once : 한번만 불러오도록 해준다.

    $title = $_POST["title"];   //태크의 name이 키값이 된다.
    $ctnt = $_POST["ctnt"];

    print "title : $title <br>";
    print "ctnt : $ctnt <br>";  //결과값이 잘 넘어왔는지 확인용

    $conn = get_conn();
    $sql =
    "
        INSERT INTO t_board
        (title, ctnt)
        VALUES
        ('${title}', '${ctnt}')
    ";

    $result = mysqli_query($conn, $sql);    //$result : 성공하면 1, 실패하면 0(빈칸) 반환됨
    mysqli_close($conn);    //연결 후에는 꼭꼭 닫아주어야한다!!!!!!
    print "result : $result <br>";     
    header("Location: list.php");       //php 리다이렉션하는 방식 중 주로 사용한다함(다른 방식도 존재-원하는 장점으로 선택해서 사용)
    die();  //중간에 실행하게 되면 밑에 있는건 볼 수 없다.(php의 break같은 존재)-마지막은 넣을 필요는 없음
   
    
?>