<?php
namespace application\controllers;

class FeedController extends Controller {
    public function index() {
        $this->addAttribute(_JS, ['feed/index']);
        $this->addAttribute(_MAIN, $this->getView("feed/index.php"));
        return "template/t1.php";
    }

    public function rest() {
        switch(getMethod()) {
            case _POST:
                //사진 배열로 넘어오는지 확인
                // if(is_array($_FILES)) {
                //     foreach($_FILES['imgs']['name'] as $key => $value) {
                //         print "key : {$key}, value : {$value} <br>";
                //     }
                // }
                // print "ctnt : " . $_POST['ctnt'] . "<br>";
                // print "location : " . $_POST['location'] . "<br>";
                if(!is_array($_FILES) || !isset($_FILES['imgs'])) {
                    return ["result" => 0];
                }
                //insFeed 메소드 호출하고 리턴 값 받은 다음
                $param = [
                    'iuser' => getIuser(),
                    'ctnt'  => $_POST['ctnt'],
                    'location' => $_POST['location'],
                ];
                $ifeed = $this->model->insFeed($param);

                foreach($_FILES['imgs']['name'] as $key => $originFileNm) {
                    $saveDirectory = _IMG_PATH . "/feed/" . $ifeed;
                    if(!is_dir($saveDirectory)) {
                        mkdir($saveDirectory, 0777, true);
                    }
                    $tempName = $_FILES['imgs']['tmp_name'][$key];
                    $rFileNm = getRandomFileNm($originFileNm);
                    if(move_uploaded_file($tempName, $saveDirectory . "/" . $rFileNm)) {
                        $param = [
                            "ifeed" =>  $ifeed,
                            "img" => $rFileNm
                        ];
                        $this->model->insFeedImg($param);
                    }
                }

                // return ["result" => $r];
        }
    }
}
