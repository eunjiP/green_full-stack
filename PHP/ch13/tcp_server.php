<?php
    //php.ini 파일의 extension=sockets 주석 제거 후 저장 > 아파치 재시작
    //gethostbyname(ip주소) : 나의 ip주소
    $addr = gethostbyname("127.0.0.1");
    $port = 5091;
    //gethostbyname(ip주소) : 도메인주소를 입력해도 ip주소로 변환해줌
    // $addr = gethostbyname("www.naver.com");
    print "addr : {$addr}<br>";

    //socket_create() : 소켓 생성 함수 
    if(($sock = socket_create(AF_INET, SOCK_STREAM, 0)) < 0) {
        echo "socket_create() failed: reason : " . socket_strerror($sock) . "<br>";
    }
    //socket_bind(소켓, ip주소, 포트) : 소켓과 ip주소, 포트를 연결하는 함수
    //결과가 0이면 성공 / 음수면 실패
    if(($ret = socket_bind($sock, $addr, $port) < 0)) {
        echo "socket_bind() failed: reason : " . socket_strerror($ret) . "<br>";
    }
    //socket_listen() : 서버에서 클라이언트의 연결을 기다리는 역할
    if(($ret = socket_listen($sock, 0)) == false) {
        echo "socket_listen() failed: reason : " . socket_strerror($msgsock) . "<br>";
    }
    $msgsock = socket_accept($sock) or die("accept failed");
    echo "Server is ready <br>";
    //socket_read() : 길이의 데이터 크기가 저장
    // 2048 : 2바이트
    $buf = "";
    $buf = socket_read($msgsock, 2048);
    if($buf == null) {
        echo "socket_listen() failed: reason : " . socket_strerror($buf) . "<br>";
    }
    echo "Receive data : $buf <br>";
    //preg_split(분할하려는 문자, 전체 문자열) : 문자열을 분할하려는 문자로 잘라서 배열 생성
    //"/\s+/" => 스페이스와 + 를 기준으로 배열 생성
    $temp = preg_split("/\s+/", $buf);
    sort($temp);
    $talkback = "";
    for($i=count($temp)-1; $i > 0 ; $i--) { 
        $talkback .= $temp[$i] . " ";
    }
    //socket_write() : 정렬한 데이터를 클라이언트에게 전달
    socket_write($msgsock, $talkback, strlen($talkback));
    echo "Send data : $talkback <br>";
    //socket_close() : 소켓 연결을 종료하는 함수
    socket_close($msgsock);
    socket_close($sock);