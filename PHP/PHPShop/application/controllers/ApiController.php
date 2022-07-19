<?php
namespace application\controllers;

class ApiController extends Controller {
    public function categoryList() {
        return $this->model->getCategoryList();
    }

    public function productInsert() {
        $json = getJson();
        return [_RESULT => $this->model->insProduct($json)];
    }

    public function productList2() {
        $result = $this->model->productList2();
        return $result === false? [] : $result;
    }
}