<?php
    //file(경로) : 한줄씩 읽어서 배열로 만들어줌
    $data = file("./name.txt");
    print_r($data);

    print "<br>-------<br>";
    foreach($data as $idx => $name) {
        print $name . "<br>";
    }