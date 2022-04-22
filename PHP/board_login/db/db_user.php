<?php
    include_once "db.php";

    function user_join($param)
    {
        $uid = $param["uid"];
        $upw = $param["upw"];
        $nm = $param["nm"];
        $gender = $param["gender"];

        $conn = get_conn();
        $sql = 
        "   INSERT INTO t_user 
            (uid, upw, nm, gender)
            VALUES 
            ('$uid', '$upw', '$nm', $gender)
        ";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }