<?php
    namespace application\controllers;
    //같은 namespace면 상속시에 use를 넣지 않아도 사용가능(아래도 똑같은 이유)
    use application\models\BoardModel;

    //php는 자식에 생성자가 있으면 자식을 객체화하면 자식 생성자 호출
    //부모클래스에 생성자가 있고 자식을 객체화해도 부모 생성자가 호출됨(java랑 다른점)
    //파일명, 클래스명 대소문자 구별 안한다.
    class BoardController extends Controller {

        public function write() {
            $this->addAttribute(_TITLE, "글쓰기");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/write.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            return "template/t1.php";
        }

        public function writeProc() {
            // 섹션값은 객체임으로 꺼낼때 배열로 꺼내는게 아니라 객체에서 값을 가지고 오는 방법으로 해결해야함
            $i_user = $_SESSION[_LOGINUSER]->i_user;
            $title = $_POST['title'];
            $ctnt = $_POST['ctnt'];
            $param = [
                "i_user" => $i_user,
                "title" => $title,
                "ctnt" => $ctnt,
            ];
            $model = new BoardModel();
            $this->addAttribute("write", $model->insBoard($param)); 
            return "redirect:/board/list";
        }

        public function list() {
            $model = new BoardModel();
            $this->addAttribute(_TITLE, "리스트");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/list.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            $this->addAttribute("list", $model->selBoardList()); 
            //위와 동일한 내용
            // $this->list = $model->selBoardList();
            $this->addAttribute(_JS, ["board/list"]);  //head에서 .js를 붙여줌

            return "template/t1.php"; //view 파일명 입력!(views 이후의 경로만 입력하면 됨)
        }

        public function detail() {
            $i_board = $_GET['i_board'];
            // print "i_board : {$i_board}<br>";
            $param = ["i_board" => $i_board];
            $model = new BoardModel();
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/detail.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            $this->addAttribute("data", $model->selBoard($param)); 
            $this->addAttribute(_JS, ["board/detail"]);
            // 열어야하는 페이지명
            return "template/t1.php";
        }

        public function del() {
            $i_board = $_GET['i_board'];
            $param = ["i_board" => $i_board];
            $model = new BoardModel();
            $this->addAttribute("del", $model->delBoard($param)); 

            // redirect: : 작업이 다 끝나고 이동해야할곳(화면까지 이동)
            //삭제는 실제로 페이지 이동하는게 아니므로 작업 후에 화면으로 이동할 곳을 지정
            return "redirect:/board/list";
        }

        public function mod() {
            $i_board = $_GET['i_board'];
            $param = ["i_board" => $i_board];
            $model = new BoardModel();
            $this->addAttribute("data", $model->selBoard($param)); 
            $this->addAttribute(_TITLE, "수정");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/mod.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            // template - 미리 만들어 놓은 레이아웃(틀)에 내용을 적용하게끔(수정용이함)
            return "template/t1.php";
        }

        public function modProc() {
            $i_board = $_POST['i_board'];
            $title = $_POST['title'];
            $ctnt = $_POST['ctnt'];
            $param = ["i_board" => $i_board,
                "title" => $title,
                "ctnt" => $ctnt];
            $model = new BoardModel();
            $this->addAttribute("mod", $model->updBoard($param)); 
            return "redirect:/board/detail?i_board={$i_board}";
        }   
    }
?>