<?php
    $host = gethostbyname("127.0.0.1");
    $port = 20211;
    set_time_limit(0);
    $maxdevice = 5;
    if(($sock = socket_create(AF_INET, SOCK_STREAM, 0)) < 0) {
        echo "socket_create() failed: reason : " . socket_strerror($sock) . "<br>";
    } 
    if(($ret = socket_bind($sock, $host, $port) < 0)) {
        echo "socket_bind() failed: reason : " . socket_strerror($ret) . "<br>";
    }
    if(($ret = socket_listen($sock, $maxdevice)) == false) {
        echo "socket_listen() failed: reason : " . socket_strerror($ret) . "<br>";
    }

    class Chat {
        function readline() {
            return rtrim(fgets(STDIN));
        }
    }

    while(true) {
        $accept = socket_accept($sock) or die("Could not accept incoming connection.");
        $msg = socket_read($accept, 1024) or die ("Could not read input\n");

        $msg = trim($msg);
        echo "Client says:\t $msg \n";

        $line = new Chat();
        echo "Enter Reply:\t";
        $reply = $line->readline();
        socket_write($accept, $reply, strlen($reply)) or die ("Coult not write output\n");
    }

    socket_close($accept);
    socket_close($sock);