<?php
    include_once "db/db_user.php";
    session_start();    
    define('PROFILE_PATH', 'img/profile/');

    //사용자의 PK값으로 각각의 폴더로 관리하기 위해서
    //주소복사로 원래 $login_user["profile_img"]값이 변경될 수 있다(얕은 복사) 
    $login_user = &$_SESSION['login_user'];
    
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
    //mb_strrpos : 파일명에 한글이 포함된 경우 사용(strrpos()사용시에 오류발생)
    $last_index = mb_strrpos($img_name, ".");
    //substr : 문자열 자르기 함수
    //mb_strrpos : 파일명에 한글이 포함된경우 
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
        //이전에 등록된 프사가 있으면 삭제!
        //섹션에 프사정보가 들어있으면 필요할때마다 select할 필요가 없음
        if($login_user["profile_img"]) {
            //저장된 파일 위치로 가서 파일이 있으면 파일을 삭제해라
            $saved_img = $target_full_path . "/" . $login_user["profile_img"];
            if(file_exists($saved_img)) {
                unlink($saved_img);
            }
        }
        
        //DB에 저장
        $param = [
            "profile_img" => $target_filenm,
            "i_user" => $login_user['i_user']
        ];
        $result = upd_profile_img($param);
        //바뀐 섹션 값의 프로필 이름을 변경해주어야한다.(변경하지 않으면 섹션이 변하지 않아서 파일이 계속 추가됨)
        $login_user["profile_img"] = $target_filenm;
        header("Location: profile.php");
    }else { //업로드 실패했을 때
        echo "업로드 실패";
    }


