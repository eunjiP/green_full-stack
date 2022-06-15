<?php
    //fopen("경로", "모드") : 파일 오픈 (경로는 상대주소, 절대주소 무관)
    //w : 덮어쓰기
    //a : 내용추가
    $filep = fopen("../lorem.txt", "a");

    if(!$filep) {
        die("파일을 열 수 없습니다.");
    }
    print "파일을 열었습니다. <br>";

    // \n : 개행(이스케이프 문자)
    // \" : "(쌍따움표)표현
    fputs($filep,"\nROMEO : 하하하하하하");