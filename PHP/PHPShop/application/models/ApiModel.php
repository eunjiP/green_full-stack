<?php
namespace application\models;
use PDO;

class ApiModel extends Model {
    public function getCategoryList() {
        $sql = "SELECT * FROM t_category
            ORDER BY cate1, cate2, cate3";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function insProduct(&$param) {
        $sql = "INSERT INTO t_product
            SET product_name = :product_name
            , product_price = :product_price
            , delivery_price = :delivery_price
            , add_delivery_price = :add_delivery_price
            , tags = :tags
            , outbound_days = :outbound_days
            , seller_id = :seller_id
            , category_id = :category_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":product_name", $param['product_name']);
        $stmt->bindValue(":product_price", $param['product_price']);
        $stmt->bindValue(":delivery_price", $param['delivery_price']);
        $stmt->bindValue(":add_delivery_price", $param['add_delivery_price']);
        $stmt->bindValue(":tags", $param['tags']);
        $stmt->bindValue(":outbound_days", $param['outbound_days']);
        $stmt->bindValue(":seller_id", $param['seller_id']);
        $stmt->bindValue(":category_id", $param['category_id']);
        $stmt->execute();
        return intval($this->pdo->lastInsertId());
    }

    public function productList(&$param) {
        $sql = "SELECT t1.*, t2.type, t2.path, t3.cate1, t3.cate2, t3.cate3
                  FROM t_product t1, t_product_img t2, t_category t3 
                 WHERE t1.id = t2.product_id
                   AND t2.type = 1
                   AND t1.category_id = t3.id";
        if(isset($param["cate3"])) {
            $cate3 = $param["cate3"];
            $sql .= " AND t3.id = {$cate3}";

        } else {
            if(isset($param["cate1"])) {
                $cate1 = $param["cate1"];
                $sql .= " AND t3.cate1 = '{$cate1}'";
            }
            if(isset($param["cate2"])) {
                $cate2 = $param["cate2"];
                $sql .= " AND t3.cate2 = '{$cate2}'";
            }
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function productList2() {
        $sql = "SELECT t3.*, t4.path FROM (
                SELECT t1.*, t2.cate1, t2.cate2, t2.cate3
                FROM t_product t1
                INNER JOIN t_category t2
                ON t1.category_id = t2.id
            ) t3
            LEFT JOIN (
                SELECT * FROM t_product_img WHERE type=1
            ) t4
            ON t3.id = t4.product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function productDetail(&$param) {
        $sql = "SELECT t3.*, t4.path FROM (
            SELECT t1.*, t2.cate1, t2.cate2, t2.cate3
            FROM t_product t1
            INNER JOIN t_category t2
            ON t1.category_id = t2.id
            WHERE t1.id = :product_id
        ) t3
        LEFT JOIN (
            SELECT * FROM t_product_img WHERE type=1
        ) t4
        ON t3.id = t4.product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":product_id", $param['product_id']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function productImageInsert(&$param) {
        $sql = "INSERT INTO t_product_img
            SET product_id = :product_id
            , type = :type
            , path = :path";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":product_id", $param['product_id']);
        $stmt->bindValue(":type", $param['type']);
        $stmt->bindValue(":path", $param['path']);
        $stmt->execute();
        return $stmt->rowCount();
    }

    //원래 있는 함수 활용하는 방법
    public function productImageList(&$param) {
        $sql = "SELECT * FROM t_product_img
            WHERE ";
        if(isset($param['product_img_id'])) {
            $sql .= "id = :product_img_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":product_img_id", $param['product_img_id']);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        $sql .= "product_id = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":product_id", $param['product_id']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function productImageDelete(&$param) {
        $sql = "DELETE FROM t_product_img
            WHERE ";
        //array_key_exists[키값,배열이름] : 배열에 키가 있는지 여부 확인
        if(isset($param['product_id'])) {
            $sql .= "product_id = " . $param['product_id'];
        } else {
            $sql .= "id = " . $param['product_img_id'];
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    // 주소 찾아서 수행 하는 방법
    // public function productImagePath(&$param) {
    //     $sql = "SELECT * FROM t_product_img
    //     WHERE id = :product_img_id";
    // $stmt = $this->pdo->prepare($sql);
    // $stmt->bindValue(":product_img_id", $param['product_img_id']);
    // $stmt->execute();
    // return $stmt->fetch(PDO::FETCH_OBJ);
    // }

    public function productDelete(&$param) {
        $sql = "DELETE FROM t_product
            WHERE id = :product_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":product_id", $param['product_id']);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function cate1List() {
        $sql = "SELECT cate1 AS cate_nm
            FROM t_category
            GROUP BY cate1
            ORDER BY cate_nm";
        $stmt = $this->pdo->prepare($sql);  
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function cate2List(&$param) {
        $sql = "SELECT cate2 AS cate_nm
            FROM t_category
            WHERE cate1 = :cate1
            GROUP BY cate2
            ORDER BY cate_nm";
        $stmt = $this->pdo->prepare($sql);  
        $stmt->bindValue(":cate1", $param['cate1']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function cate3List(&$param) {
        $sql = "SELECT id, cate3 AS cate_nm
            FROM t_category
            WHERE cate1 = :cate1
            AND cate2 = :cate2
            GROUP BY cate3
            ORDER BY cate_nm";
        $stmt = $this->pdo->prepare($sql);  
        $stmt->bindValue(":cate1", $param['cate1']);
        $stmt->bindValue(":cate2", $param['cate2']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}