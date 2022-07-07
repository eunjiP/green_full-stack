<?php
namespace application\controllers;
use application\libs\Application;

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
                    $result->pw = null;
                    $result->regdt = null;
                    $this->flash(_LOGINUSER, $result);
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

    public function logout() {
        $this->flash(_LOGINUSER);
        return "redirect:/user/signin";
    }

    public function feedwin() {
        $iuser = isset($_GET["iuser"]) ? intval($_GET["iuser"]) : 0;
        $param = [ 
            "feediuser" => $iuser,
            "loginiuser" => getIuser() 
        ];
        $this->addAttribute(_DATA, $this->model->selUserProfile($param));
        $this->addAttribute(_JS, ['user/feedwin', 'https://unpkg.com/swiper@8/swiper-bundle.min.js']);
        $this->addAttribute(_CSS, ['user/feedwin', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', 'feed/index']);
        $this->addAttribute(_MAIN, $this->getView("user/feedwin.php"));
        return "template/t1.php";
    }

    public function feed() {
        if(getMethod() === _GET) {
            $page = 1;
            if(isset($_GET['page'])) {
                $page = intval($_GET['page']);
            }
            $startIdx = ($page - 1) * _FEED_ITEM_CNT;
            $param = [
                "startIdx" => $startIdx,
                'toiuser' => $_GET['iuser'],
                'loginiuser' => getIuser()
            ];
            $list = $this->model->selFeedList($param);
            forEach($list as $item) {
                $param2 = [ 'ifeed' => $item->ifeed];
                $item->imgList  = Application::getModel("feed")->selFeedImgList($param2);
                $item->cmt = Application::getModel("feedcmt")->selFeedCmt($param2);
            }
            return $list;
        }
    }

    public function follow() {
        $param = [
            "fromIuser" => getIuser()
        ];
        switch(getMethod()) {
            case _POST:
                $json = getJson();
                $param["toIuser"] = $json['toiuser'];
                return [_RESULT => $this->model->insUserFollow($param)];
            case _DELETE:
                $param["toIuser"] = $_GET['toiuser'];
                return [_RESULT => $this->model->delUserFollow($param)];
        }
    }

    public function profile() {
        $loginUser = getLoginUser();
        switch(getMethod()) {
            case _DELETE:
                if($loginUser) {
                    $path = "static/img/profile/{$loginUser->iuser}/{$loginUser->mainimg}";
                    if(file_exists($path) && unlink($path)) {
                        $param = ["iuser" => $loginUser->iuser, "delMainImg" => 1];
                        if($this->model->updUser($param)) {
                            rmdir("static/img/profile/{$loginUser->iuser}");
                            $loginUser->mainimg = null;
                            return [_RESULT => 1];
                        }
                    }
                }
                return [_RESULT => 0];
            case _POST:
                if(!is_array($_FILES) || !isset($_FILES['imgs'])) {
                    //에러가 발생 시 JSON형태로 0이 리턴
                    return [_RESULT => 0];
                }
                $key = $_FILES['imgs']['name'];
                $saveDirectory = _IMG_PATH . "/profile/" . getIuser();
                if(!is_dir($saveDirectory)) {
                    mkdir($saveDirectory, 0777, true);
                }
                if(getLoginUser()->mainimg) {
                    $path = $saveDirectory . "/" . getLoginUser()->mainimg;
                    unlink($path);
                }
                $tempName = $_FILES['imgs']['tmp_name'];
                $rFileNm = getRandomFileNm($key);
                if(move_uploaded_file($tempName, $saveDirectory . "/" . $rFileNm)) {
                    $param = [
                        'iuser' => getIuser(),
                        'mainimg' => $rFileNm
                    ];
                    if($this->model->updUser($param)) {
                        $loginUser->mainimg = $rFileNm;
                        return [_RESULT => $rFileNm];
                    }
                }
                
        }
    }

    public function userInfo() {
        switch(getMethod()) {
            case _POST:
                $json = getJson();
                $json['iuser'] = getIuser();
                return [_RESULT => $this->model->updUserInfo($json)];
        }
    }
}