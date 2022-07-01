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
        $sql = "SELECT A.iuser, A.email, A.nm, A.cmt, A.mainimg, count(B.ifeed) feedCtn,
            (SELECT COUNT(fromiuser) FROM t_user_follow WHERE fromiuser = $feediuser AND toiuser = $loginiuser) AS youme, 
            (SELECT COUNT(fromiuser) FROM t_user_follow WHERE fromiuser = $loginiuser AND toiuser = $feediuser) AS meyou,
            (SELECT COUNT(fromiuser) AS follow FROM t_user_follow WHERE toiuser = $feediuser) AS foller,
            (SELECT COUNT(fromiuser) AS follow FROM t_user_follow WHERE fromiuser = $feediuser) AS follow
            FROM t_user A
            INNER JOIN t_feed B
            ON A.iuser = B.iuser
            GROUP BY iuser
            HAVING iuser = $feediuser";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    
}