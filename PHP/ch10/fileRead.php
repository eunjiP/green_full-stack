<?php
    //fopen("경로", "모드") : 파일 오픈 (경로는 상대주소, 절대주소 무관)
    $filep = fopen("../lorem.txt", "r");

    if(!$filep) {
        die("파일을 열 수 없습니다.");
    }
    print "파일을 열었습니다. <br>";

    //fgets(파일변수, 길이) : 길이 생략 가능
    while($line = fgets($filep, 10)) {
        print $line . "<br>";
    }

    fclose($filep);