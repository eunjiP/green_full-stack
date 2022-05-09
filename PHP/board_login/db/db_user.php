<?php

use LDAP\Result;

    include_once "db.php";

    //join
    function ins_user(&$param)
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
    //&(주소값전달)를 붙여서 메모리를 낭비를 최소화
    //login
    function sel_user(&$param) {
        $uid = $param["uid"];
        $sql = "SELECT i_user, uid, upw, nm, gender
            FROM t_user
            WHERE uid = '$uid'";
        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return mysqli_fetch_assoc($result);
    }

    //이미지 추가하는 함수
    function upd_profile_img(&$param) {
        $sql = "UPDATE t_user SET profile_img = '{$param["profile_img"]}' WHERE i_user = {$param["i_user"]}";
        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }