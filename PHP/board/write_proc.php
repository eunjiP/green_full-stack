<?php
    include_once "db.php";   //include:다른 파일에 정의한 함수를 불러올 수 잇다.
        //include_once : 한번만 불러오도록 해준다.

    $title = $_POST["title"];   //태크의 name이 키값이 된다.
    $ctnt = $_POST["ctnt"];


    $conn = get_conn();
    $sql =
    "
        INSERT INTO t_board
        (title, ctnt)
        VALUES
        ('${title}', '${ctnt}')
    ";

    $result = mysqli_query($conn, $sql);    //$result : 영향준 행의 수가 입력됨
    mysqli_close($conn);    //연결 후에는 꼭꼭 닫아주어야한다!!!!!!
    print "result : $result <br>";     
    header("Location: list.php");       //php 리다이렉션
    die();  //중간에 실행하게 되면 밑에 있는건 볼 수 없다.(php의 break같은 존재)-마지막은 넣을 필요는 없음
   
    
?>