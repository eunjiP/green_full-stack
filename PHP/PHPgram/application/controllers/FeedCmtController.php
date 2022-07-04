<?php
    namespace application\controllers;

    class FeedCmtController extends Controller {

        public function index() {
            switch(getMethod()) {
                case _POST:
                    $json = getJson();
                    return [_RESULT =>$this->model->insFeedCmt($json)];
            }
        }
    }