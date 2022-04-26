<?php
    include_once "db/db_user.php";
    //login.php 에서 넘어오는 값을 적절한 변수에 담는다.
    //변수의 값을 출력

    $uid = $_POST['uid'];
    $upw = $_POST['upw'];

    print $uid . "<br>";
    print $upw . "<br>";

    //배열로 변경하게되면 선언부의 변경이 이루어짐으로 최대한 수정을 줄이기위해 
    //배열로 사용(함수의 선언부는 변경하지 않도록 하는게 좋다)
    $param = [
        "uid" => $uid
    ];

    $result = sel_user($param);
    // if(empty($result)) {
    //      echo "해당하는 아이디 없음";
    //         die;
    // }

    echo "i_user : " , $result["i_user"] , "<br>";
    echo "pw : " , $result["upw"] , "<br>";

    //비밀번호가 맞으면 "list.php"로 주소 이동
    //비밀번호가 맞지않으면 "login.php로 주소 이동"
    if($result['upw'] === $upw || empty($result)) {
        session_start();
        $_SESSION["login_user"] = $result;
            //$_SESSION은 배열값으로도 값을 넘길 수 있다.
        header("Location: list.php");
    }
    else {
        header("Location: login.php");
    }
