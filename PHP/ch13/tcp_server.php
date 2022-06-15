<?php
    //php.ini 파일의 extension=sockets 주석 제거 후 저장 > 아파치 재시작
    //gethostbyname(ip주소) : 나의 ip주소
    $addr = gethostbyname("127.0.0.1");
    $port = 5091;
    //gethostbyname(ip주소) : 도메인주소를 입력해도 ip주소로 변환해줌
    // $addr = gethostbyname("www.naver.com");
    print "addr : {$addr}<br>";

    if(($sock = socket_create(AF_INET, SOCK_STREAM, 0)) < 0) {
        echo "socket_create() failed: reason : " . socket_strerror($sock) . "<br>";
    }