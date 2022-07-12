<?php
namespace application\libs;
// inclued할 경우 라이브러리에 받아 놓으면 다른 파일에 하지 않아도 됨
require_once "application/utils/UrlUtils.php";


class Application{
    
    public $controller;
    public $action;
    private static $modelList = [];

    public function __construct() {        
        $urlPaths = getUrlPaths();
        $controller = isset($urlPaths[0]) && $urlPaths[0] != '' ? $urlPaths[0] : 'board';
        $action = isset($urlPaths[1]) && $urlPaths[1] != '' ? $urlPaths[1] : 'index';

        if (!file_exists('application/controllers/'. $controller .'Controller.php')) {
            echo "해당 컨트롤러가 존재하지 않습니다.";
            exit();
        }

        $controllerName = 'application\controllers\\' . $controller . 'controller';                
        $model = $this->getModel($controller);
        new $controllerName($action, $model);
    }

    //user에서도 feed model을 사용 할 수 있게 만들어야함
    public static function getModel($key) {
        if(!in_array($key, static::$modelList)) {
            $modelName = 'application\models\\' . $key . 'model';
            static::$modelList[$key] = new $modelName();
        }
        return static::$modelList[$key];
    }
}