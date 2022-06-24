<?php
namespace application\controllers;

//UserController : model이 자동으로 객체화됨(model객체를 여러개 만들 필요가 없음)
class UserController extends Controller {
    public function signin() {   
        switch(getMethod()) {
            case _GET:
                return "user/signin.php";
            case _POST:
                $email = $_POST['email'];
                $pw = $_POST['pw'];
                $param = [
                    'email' => $email,
                ];
                $result = $this->model->selUser($param);
                //password_verify : 암호화 패스워드를 확인하는 함수
                if($result && password_verify($pw, $result->pw)) {
                    session_start();
                        $_SESSION[_LOGINUSER] = $result;
                        return 'redirect:/feed/index';
                } else {
                    return "redirect:signin?email={$email}&err";
                }
        }     
    }
    

    public function signup() {
        
        // if(getMethod() === _GET) {
        //     return "user/signup.php";
        // } elseif(getMethod() === _POST) {
        //     return "redirect:signin";
        // }

        switch(getMethod()) {
            case _GET:
                return "user/signup.php";
            case _POST:
                if(!empty($_POST['pw'])) {
                    $param = [
                        'email' => $_POST['email'],
                        'pw' => password_hash($_POST['pw'], PASSWORD_BCRYPT),
                        'nm' => $_POST['nm'],
                    ];
                    $this->model->insUser($param);
                    return "redirect:signin";
                }
        }
    }
}