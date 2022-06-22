<?php
namespace application\controllers;

include_once "application/utils/SessionUtils.php";

abstract class Controller {
    public function __construct($action) {        
        $view = $this->$action();
        //require_once 때문에 뷰에 적은 내용이 컨트롤러밑에 들어가는 것과 같은 효과가 난다
        require_once $this->getView($view); 
    }
    
    protected function addAttribute($key, $val) {
        $this->$key = $val;
    }

    protected function getView($view) {
        if(strpos($view, "redirect:") === 0) {
            header("Location: " . substr($view, 9));
        }
        //_VIEW : 상수
        return _VIEW . $view;
    }
}

