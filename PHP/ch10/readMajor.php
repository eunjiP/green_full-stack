<?php
    //file(경로) : 한줄씩 읽어서 배열로 만들어줌
    $data = file("./major.txt");
    print_r($data);

    print "<br>-------<br>";
    foreach($data as  $line) {
        //explode(기준 문자, 분리하려는 문자열) : 기준 문자를 잘라서 배열을 만들어줌 
        $div = explode(" ", $line);
        print "Name : {$div[0]}, Major : {$div[1]} <br>";
    }