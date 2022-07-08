<?php
//참조하는 페이지
use ws\RatchetSocket;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require_once 'application/libs/Config.php';
require __DIR__ . '/vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new RatchetSocket()
        )
    ),
    //포트번호부분
    8090
);

$server->run();