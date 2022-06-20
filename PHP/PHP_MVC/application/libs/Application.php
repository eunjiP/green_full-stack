<?php
// 핵심
namespace application\libs;

//실제로 파일을 여는 곳
class Application{
    
    public $controller;
    public $action;

    public function __construct() {
        $getUrl = '';
        if (isset($_GET['url'])) {
            $getUrl = rtrim($_GET['url'], '/');
            $getUrl = filter_var($getUrl, FILTER_SANITIZE_URL);
        }        
        $getParams = explode('/', $getUrl);
        $controller = isset($getParams[0]) && $getParams[0] != '' ? $getParams[0] : 'board';
        $action = isset($getParams[1]) && $getParams[1] != '' ? $getParams[1] : 'index';

        if (!file_exists('application/controllers/'. $controller .'Controller.php')) {
            echo "해당 컨트롤러가 존재하지 않습니다.";
            exit();
        }
        //$controller -> board가 담겨 있다
        $controllerName = 'application\controllers\\' . $controller . 'controller';   
        //$action : 마지막 주소값(2차 주소값) - 객체 생성시에 보낸다     
        new $controllerName($action);   //생성자 호출
    }
}