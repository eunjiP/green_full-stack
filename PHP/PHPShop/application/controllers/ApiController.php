<?php
namespace application\controllers;
use Exception;

class ApiController extends Controller {
    public function categoryList() {
        return $this->model->getCategoryList();
    }

    public function productInsert() {
        $json = getJson();
        return [_RESULT => $this->model->insProduct($json)];
    }

    public function productList() {
        $param = [];

        if(isset($_GET["cate3"])) {
            $cate3 = intval($_GET["cate3"]);
            if($cate3 > 0) {
                $param["cate3"] = $cate3;
            }
        } else {
            if(isset($_GET["cate1"])) {
                $param["cate1"] = $_GET["cate1"];
            }
            if(isset($_GET["cate2"])) {
                $param["cate2"] = $_GET["cate2"];
            }
        }                 
        return $this->model->productList($param);         
    }

    public function productList2() {
        return $this->model->productList2();
    }

    public function productDetail() {
        $urlPaths = getUrlPaths();
        if(!isset($urlPaths[2])) {
            exit();
        }
        $param = [
            'product_id' => intval($urlPaths[2])
        ];
        return $this->model->productDetail($param);
    }

    public function upload() {
        $urlPaths = getUrlPaths();
        if(!isset($urlPaths[2]) || !isset($urlPaths[3])) {
            exit();
        }
        $productId = intval($urlPaths[2]);
        $type = intval($urlPaths[3]);
        $json = getJson();
        //explode : 특정 기준으로 문자열 자르기
        //$json["image"] 의 결과는 문자열이고 ;base64,기준으로 앞에는 0번 칸에 뒤에는 1번 칸에 값이 들어간다
        $image_parts = explode(";base64,", $json["image"]);
        //$image_parts의 2개의 배열중 0번칸의 값중에 image/기준으로 값을 자른다
        $image_type_aux = explode("image/", $image_parts[0]); 
        //$image_type_aux[1] : 확장자 명이 존재함
        $image_type = $image_type_aux[1];   
        // base64_decode() : 인코딩된 base64문자열을 본래의 내용으로 해독하여 복원하는 함수 
        $image_base64 = base64_decode($image_parts[1]);
        $dirPath = _IMG_PATH . "/" . $productId . "/" . $type;
        // uniqid() : 유니크 ID를 생성하는 함수
        $filePath = $dirPath . "/" . uniqid() . "." . $image_type;
        if(!is_dir($dirPath)) {
            mkdir($dirPath, 0777, true);
        }
        //$file = _IMG_PATH . "/" . $productId . "/" . $type . "/" . uniqid() . "." . $image_type;
        //$file = "static/" . uniqid() . "." . $image_type;
        $result = file_put_contents($filePath, $image_base64); 
        if($result) {
            $param = [
                'product_id' => $productId,
                'type' => $type, 
                //새롭게 uniqid를 호출하면 실제 파일명과 DB파일명이 다름=>최종 파일 경로에서 /를 기준으로 자르고 마지막 인덱스만 가지고 온다(결국 파일 명만 가지고 오는것)
                'path' => end(explode("/", $filePath))
            ];
            return [_RESULT => $this->model->productImageInsert($param)];
        }
        return [_RESULT => 0];
    }

    public function productImageList() {
        $urlPaths = getUrlPaths();
        if(!isset($urlPaths[2])) {
            exit();
        }
        $productId = intval(($urlPaths[2]));
        $param = [
            'product_id' => $productId
        ];
        return $this->model->productImageList($param);
    }

    public function productImageDelete() {
        $urlPaths = getUrlPaths();
        if(!isset($urlPaths[2])) {
            exit();
        }
        $result = 0;
        switch(getMethod()) {
            case _DELETE:
                $param = [
                    'product_img_id' => intval(($urlPaths[2]))
                ];
                $imgPath = $this->model->productImageList($param);
                $dirPath = _IMG_PATH . "/" . $imgPath->product_id . "/" . $imgPath->type . "/" . $imgPath->path;
                unlink($dirPath);

                $result = $this->model->productImageDelete($param);
                break;
        }
        return [_RESULT => $result];
    }

    public function productDelect() {
        $urlPaths = getUrlPaths();
        if(!isset($urlPaths[2])) {
            exit();
        }
        $result = 0;
        switch(getMethod()) {
            case _DELETE:
                $product_id = $urlPaths[2];
                $param = [
                    'product_id' => intval($product_id)
                ];
                try {
                    // beginTransaction : mySQL의 autoCommit을 끄는 역할
                    $this->model->beginTransaction();
                    $result1 = $this->model->productImageDelete($param);
                    $dirname = _IMG_PATH . '/' . $product_id;
                    //내가 만든 파일과 폴더 삭제(폴더 안에 폴더가 또 있으면 삭제 불가로 FileUtils에 rmdirAll함수 존재함!!)
                    // for($i=1;$i<4;$i++) {
                    //     array_map('unlink', glob("$dirname/$i/*.*"));
                    // }
                    // for($i=1;$i<4;$i++) {
                    //     array_map('rmdir', glob("$dirname/$i"));
                    // }
                    // rmdir($dirname);
                    $result = $this->model->productDelete($param);
                    if($result) {
                        rmdirAll($dirname);
                        $this->model->commit();
                    } else {
                        $this->model->rollback();
                    } 
                } catch (Exception $e) {
                    print "에러발생<br>";
                    print $e . "<br>";
                    $this->model->rollback();
                }
            return [_RESULT => $result];
        }
    }

    public function cate1List() {
        return $this->model->cate1List();
    }

    public function cate2List() {
        $urlPaths = getUrlPaths();
        if(count($urlPaths) !== 3) {
            exit();
        } 
        $param = [
            'cate1' => $urlPaths[2]
        ];
        return $this->model->cate2List($param);
    }

    public function cate3List() {
        $urlPaths = getUrlPaths();
        if(count($urlPaths) !== 4) {
            exit();
        }   
        $param = [
            'cate1' => $urlPaths[2],
            'cate2' => $urlPaths[3]
        ];
        return $this->model->cate3List($param);
    }
}