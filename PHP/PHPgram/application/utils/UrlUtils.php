<?php
    //json형태를 배열 형식으로 바꿔주는 함수
    //PHP에서 $_GET, $_POST파라미터에서 파싱결과가 빈 값으로 넘어오는 경우가 있는데, 
    //그럴 때 넘어온 데이터를 파싱하기 이전의 순수 데이터로 전달받을 때 사용한다.
    function getJson() {
        return json_decode(file_get_contents('php://input'), true);
    }

    function getParam($key) {
        return isset($_GET[$key]) ? $_GET[$key] : "";
    }

    function getUrl() {
        return isset($_GET['url']) ? rtrim($_GET['url'], '/') : "";
    }
    
    function getUrlPaths() {
        $getUrl = getUrl();        
        return $getUrl !== "" ? explode('/', $getUrl) : "";
    }

    function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

    function isGetOne() {
        $urlPaths = getUrlPaths();
        if(isset($urlPaths[2])) { //one
            return $urlPaths[2];
        }
        return false;
    }