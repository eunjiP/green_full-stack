<?php
    //같은 namespace면 상속시에 use를 넣지 않아도 사용가능
    namespace application\models;
    //PDO : 라이브러리
    use PDO;

    class BoardModel extends Model {
        public function selBoardList() {
            $sql = "SELECT i_board, title, created_at FROM t_board
                ORDER BY i_board DESC";
            //prepare(준비하다)를 사용하는 이유 : 쿼리문이 변경되어야 하는 경우 편하다
            //(문자열이면 알아서 홑따움표, 숫자는 알아서 홑따움표 제거해줌)
            $stmt = $this->pdo->prepare($sql);  //stmt 객체 생성 후에 prepare사용가능
            //쿼리문 실행
            $stmt->execute();
            //fetchAll : 여러줄(베열형식) / fetch : 한줄
            //fetchAll(PDO::FETCH_OBJ) : 한줄씩은 객체로 리턴 / fetchAll() : 한줄씩도 배열로 리턴
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }