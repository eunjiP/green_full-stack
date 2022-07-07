<?php
namespace application\models;
use PDO;


//$pdo -> lastInsertId();

class UserModel extends Model {
    public function insUser(&$param) {
        $sql = "INSERT INTO t_user
                ( email, pw, nm ) 
                VALUES 
                ( :email, :pw, :nm )";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":email", $param["email"]);
        $stmt->bindValue(":pw", $param["pw"]);
        $stmt->bindValue(":nm", $param["nm"]);
        $stmt->execute();
        return $stmt->rowCount();

    }
    
    public function selUser(&$param) {
        $sql = "SELECT * FROM t_user
                WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":email", $param["email"]);        
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function selUserProfile(&$param) {
        $feediuser = $param['feediuser'];
        $loginiuser = $param['loginiuser'];
        $sql = "SELECT A.iuser, A.email, A.nm, A.cmt, A.mainimg, (SELECT COUNT(ifeed) FROM t_feed WHERE iuser = {$feediuser}) AS feedCnt,
            (SELECT COUNT(fromiuser) FROM t_user_follow WHERE fromiuser = $feediuser AND toiuser = $loginiuser) AS youme, 
            (SELECT COUNT(fromiuser) FROM t_user_follow WHERE fromiuser = $loginiuser AND toiuser = $feediuser) AS meyou,
            (SELECT COUNT(fromiuser) AS follow FROM t_user_follow WHERE toiuser = $feediuser) AS followerCnt,
            (SELECT COUNT(fromiuser) AS follow FROM t_user_follow WHERE fromiuser = $feediuser) AS followCnt
            FROM t_user A
            WHERE iuser = {$feediuser}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    //---------------------- Follow -------------------------------//
    public function insUserFollow(&$param) {
        $sql = "INSERT INTO t_user_follow
            (fromiuser, toiuser)
            VALUES
            (:fromIuser, :toIuser)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":fromIuser", $param["fromIuser"]);        
        $stmt->bindValue(":toIuser", $param["toIuser"]);        
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delUserFollow(&$param) {
        $sql = "DELETE FROM t_user_follow
            WHERE fromiuser = :fromIuser
            AND toiuser = :toIuser";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":fromIuser", $param["fromIuser"]);        
        $stmt->bindValue(":toIuser", $param["toIuser"]);        
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    //---------------------- Feed -------------------------------//
    public function selFeedList(&$param) {
        $toiuser = $param['toiuser'];
        $loginiuser = $param['loginiuser'];
        $sql = "SELECT A.ifeed, A.location, A.ctnt, A.iuser, A.regdt,
            C.nm AS writer, C.mainimg
            ,IFNULL(E.cnt, 0) AS favCnt
            ,IF(D.ifeed IS NULL, 0, 1) AS isFav
            FROM t_feed A
            INNER JOIN t_user C
            ON A.iuser = C.iuser
            LEFT JOIN (
                SELECT ifeed, COUNT(ifeed) AS cnt
                FROM t_feed_fav
                GROUP BY ifeed
                ) E
            ON A.ifeed = E.ifeed
            LEFT JOIN (
                SELECT ifeed
                FROM t_feed_fav
                WHERE iuser = {$loginiuser}
                ) D
            ON A.ifeed = D.ifeed
            WHERE C.iuser = $toiuser
            ORDER BY A.ifeed DESC
            LIMIT :startIdx, :feedItemCnt";

        $stmt = $this->pdo->prepare($sql);  
        $stmt->bindValue(":startIdx", $param['startIdx']);
        $stmt->bindValue(":feedItemCnt", _FEED_ITEM_CNT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function updUser(&$param) {
        $sql = "UPDATE t_user
            SET moddt = now() ";
        if(isset($param['mainimg'])) {
            $mainimg = $param['mainimg'];
            $sql .= ", mainimg = '{$mainimg}'";
        }
        if(isset($param['delMainImg'])) {
            $sql .= ", mainimg = null";
        }

        $sql .= " WHERE iuser = :iuser";
        $stmt = $this->pdo->prepare($sql);  
        $stmt->bindValue(":iuser", $param['iuser']);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function updUserInfo(&$param) {
        $sql = "UPDATE t_user
            SET nm = :nm, cmt = :cmt
            WHERE iuser = :iuser";
        $stmt = $this->pdo->prepare($sql);  
        $stmt->bindValue(":nm", $param['nm']);
        $stmt->bindValue(":cmt", $param['cmt']);
        $stmt->bindValue(":iuser", $param['iuser']);
        $stmt->execute();
        return $stmt->rowCount();
    }


}