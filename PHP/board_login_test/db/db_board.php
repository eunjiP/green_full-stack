<?php
    include_once "db.php";

    function ins_board(&$param) {
        $title = $param['title'];
        $ctnt = $param['ctnt'];
        $i_user = $param['i_user'];

        $conn = get_conn();
        $sql = "INSERT INTO t_board (title, ctnt, i_user)
            VALUES ('$title', '$ctnt', $i_user)";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function sel_board_list() {
        $conn = get_conn();
        $sql = "SELECT A.i_board, A.title, B.nm, A.created_at 
        FROM t_board A
        INNER JOIN t_user B
        ON A.i_user = B.i_user
        ORDER BY A.i_board DESC";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function del_board_list() {
        session_start();
        if(!isset($_SESSION['login_user'])){
            header("Location: login.php");
        }
    }

    function sel_board($param){
        $i_board = $param['i_board'];

        $conn = get_conn();
        $sql =
        "   SELECT A.i_board, A.title, A.created_at, A.i_user, A.ctnt, B.nm, B.i_user
            FROM t_board A
            INNER JOIN t_user B
            ON A.i_user = B.i_user
            WHERE A.i_board = $i_board
        ";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return mysqli_fetch_assoc($result);
    }