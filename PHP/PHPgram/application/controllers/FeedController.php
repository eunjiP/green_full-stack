<?php
namespace application\controllers;

class FeedController extends Controller {
    public function index() {
        $this->addAttribute(_JS, ['feed/index']);
        $this->addAttribute(_CSS, ['feed/index']);
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
                    //에러가 발생 시 JSON형태로 0이 리턴
                    return ["result" => 0];
                }
                //insFeed 메소드 호출하고 리턴 값 받은 다음
                $param = [
                    'iuser' => getIuser(),
                    'ctnt'  => $_POST['ctnt'],
                    'location' => $_POST['location'],
                ];
                $ifeed = $this->model->insFeed($param);

                $paramImg = ["ifeed" =>  $ifeed];
                foreach($_FILES['imgs']['name'] as $key => $originFileNm) {
                    $saveDirectory = _IMG_PATH . "/feed/" . $ifeed;
                    if(!is_dir($saveDirectory)) {
                        mkdir($saveDirectory, 0777, true);
                    }
                    $tempName = $_FILES['imgs']['tmp_name'][$key];
                    $rFileNm = getRandomFileNm($originFileNm);
                    if(move_uploaded_file($tempName, $saveDirectory . "/" . $rFileNm)) {
                        $paramImg["img"] = $rFileNm;
                        $this->model->insFeedImg($paramImg);
                    }
                }
                return ["result" => 1];

            case _GET:
                $page = 1;
                if(isset($_GET['page'])) {
                    $page = intval($_GET['page']);
                }
                $startIdx = ($page - 1) * _FEED_ITEM_CNT;
                $param = [
                    "startIdx" => $startIdx,
                    "iuser" => getIuser()
                ];
                $list = $this->model->selFeedList($param);
                foreach($list as $item) {
                    $item->imgList = $this->model->selFeedImgList($item);
                }
                return $list;
        }
    }
}
