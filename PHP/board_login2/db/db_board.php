<?php
    include_once "db.php";

    //write
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

    //페이지 숫자 구하는 함수
    function sel_paging_count(&$param) {
        $row_count = $param['row_count'];
        $conn = get_conn();
        $sql ="SELECT ceil(COUNT(i_board) / $row_count ) as cnt FROM t_board";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        $row = mysqli_fetch_assoc($result);
        return $row['cnt'];
    }

    //list -> 페이징 기술 추가됨
    function sel_board_list(&$param) {
        $start_idx = $param['start_idx'];
        $row_count = $param['row_count'];
        $conn = get_conn();
        $sql = "SELECT A.i_board, A.title, B.nm, A.created_at 
        FROM t_board A
        INNER JOIN t_user B
        ON A.i_user = B.i_user
        ORDER BY A.i_board DESC
        LIMIT $start_idx, $row_count";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    //detail
    function sel_board(&$param) {
        $i_board = $param['i_board'];

        $conn = get_conn();
        $sql = "SELECT A.title, B.nm, A.created_at, A.ctnt, B.i_user 
        FROM t_board A
        INNER JOIN t_user B
        ON A.i_user = B.i_user
        WHERE A.i_board = $i_board";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return mysqli_fetch_assoc($result);
        // return $result;
    }

    //최신글(다음글)
    function sel_next_board(&$param) {
        $i_board = $param['i_board'];

        $conn = get_conn();
        $sql = "SELECT i_board FROM t_board
        WHERE i_board > $i_board
        ORDER BY i_board
        LIMIT 1";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            return $row['i_board'];
        }
        return 0;
    }

    //지난글(이전글)
    function sel_prev_board(&$param) {
        $i_board = $param['i_board'];

        $conn = get_conn();
        $sql = "SELECT i_board FROM t_board
        WHERE i_board  < $i_board
        ORDER BY i_board DESC
        LIMIT 1";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            return $row['i_board'];
        }
        return 0;
    }

    //mod
    function upd_board(&$param) {
        $i_board = $param['i_board'];
        $i_user = $param['i_user'];
        $title = $param['title'];
        $ctnt = $param['ctnt'];

        $conn = get_conn();
        $sql = "UPDATE t_board SET title = '$title', ctnt = '$ctnt', updated_at = now()
        WHERE i_board = $i_board AND i_user = $i_user";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    //del
    function del_board(&$param) {
        $i_user = $param['i_user'];
        $i_board = $param['i_board'];

        $conn = get_conn();
        $sql = "DELETE FROM t_board WHERE i_board = $i_board AND i_user = $i_user";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }


    function search_board(&$param) {
        $conn = get_conn();
        $search_select = $param['search_select'];   // select선택값
        $search_input_txt = $param['search_input_txt']; // 검색어
        $textArray = explode(" ", $search_input_txt);//검색어를 공백으로 나눈다
        $where = [];  //sql검색 시 열(속성) 이름
        $qurey = "SELECT A.i_board, A.title, B.nm, A.created_at, A.ctnt, B.i_user 
                FROM t_board A
                INNER JOIN t_user B
                ON A.i_user = B.i_user 
                WHERE ";

        switch($search_select) {
            case "search_writer":
                $where += ["B.nm"];
                break;
            case "search_title":
                $where += ["A.title"];
                break;
            case "search_ctnt":
                $where += ["A.title", "A.ctnt"];
                break;
            default:
        }

        for ($j=0; $j < count($where); $j++) { 
            for ($i=0; $i < count($textArray); $i++) { 
                $qurey = $qurey . " $where[$j] LIKE '%$textArray[$i]%' ";
                //마지막 검색어가 아니면
                if (($i !== count($textArray) -1) || ($j !== count($where) -1 )) { 
                    $qurey = $qurey . "OR";
                }
            }
        }
        
        


        $result = mysqli_query($conn, $qurey);
        mysqli_close($conn);
        return $result;
    }