<?php
    //방문 일시 남길때 사용
    $filep = fopen("./logfile.txt", "a");
    if(!$filep) {
        die("파일을 열 수 없습니다.");
    }
    //"m-d H:i:s" : 06-15 13:09:16
    //"y-m-d H:i:s" : 22-06-15 13:09:50 / 2022-06-15 13:10:10 
    //"Y-M-d H:i:s" : 2022-Jun-15 13:10:24 / "Y-M-D H:i:s" : 2022-Jun-Wed 13:10:57
    //"Y-m-d h:i:s" : 2022-06-15 01:11:24(12시간 표기)
    $now = date("Y-m-d H:i:s", time());
    fputs($filep, $now . "\n");
    fclose($filep);

    print "Connect Service";