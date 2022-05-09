<?php
    session_start();    
    define('PROFILE_PATH', 'img/profile/');

    //사용자의 PK값으로 각각의 폴더로 관리하기 위해서
    $login_user = $_SESSION['login_user'];
    
    if($_FILES["img"]["name"] === "") {
        echo "이미지 없음";
        exit;
    }

    //항상 새로운 uuid만들어주는 함수
    function gen_uuid_v4() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x'
            , mt_rand(0, 0xffff)
            , mt_rand(0, 0xffff)
            , mt_rand(0, 0xffff)
            , mt_rand(0, 0xffff) | 0x4000
            , mt_rand(0, 0xffff) | 0x8000
            , mt_rand(0, 0xffff)
            , mt_rand(0, 0xffff)
            , mt_rand(0, 0xffff)
        );
    }
    $img_name = $_FILES["img"]["name"];
    //lastindexOf : 검색하려는 인덱스 번호를 알려주는 함수
    //php - strrpos()를 사용(오른쪽에서 만나는 가장 첫번째의 인덱스번호 리턴)
    $last_index = strrpos($img_name, ".");
    //substr : 문자열 자르기 함수
    $ext = mb_substr($img_name, $last_index);

    //실제로 DB에 저장하는 값
    $target_filenm = gen_uuid_v4() . $ext;
    //실제로 이미지를 저장하는 폴더
    $target_full_path = PROFILE_PATH . $login_user['i_user'];
    //폴더가 없을 경우 폴더를 만들어라
    if(!is_dir($target_full_path)) {
        mkdir($target_full_path, 0777, true);
    }

    $tmp_img = $_FILES['img']['tmp_name'];
    //move_uploaded_file(업로드할 파일의 이름, 업로드 경로) => true/false를 리턴하는 함수
    $imageUpload = move_uploaded_file($tmp_img, $target_full_path . "/" . $target_filenm);
    if($imageUpload) {  //업로드 성공했을때
        header("Location: profile.php");
    }else { //업로드 실패했을 때
        echo "업로드 실패";
    }


