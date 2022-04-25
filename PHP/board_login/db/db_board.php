<?php
    include_once "db.php";

    function ins_board($param) {
        $title = $param['title'];
        $ctnt = $param['ctnt'];
        $i_user = $param['i_user'];

        $conn = get_conn();
        $sql = "INSERT INTO t_board (title, ctnt, i_user)
            VALUES ('$title', '$ctnt', '$i_user')";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }