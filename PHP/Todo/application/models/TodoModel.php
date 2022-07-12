<?php
namespace application\models;
use PDO;

class TodoModel extends Model {
    public function insTodo(&$param) {
        $sql = "INSERT INTO t_todo
            (todo)
            VALUES
            (:todo)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":todo", $param['todo']);
        $stmt->execute();
        return intval($this->pdo->lastInsertId());
    }

    public function selTodo() {
        $sql = "SELECT * FROM t_todo ORDER BY itodo";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function delTodo(&$param) {
        $itodo = $param['itodo'];
        $sql = "DELETE FROM t_todo ";
        if($itodo > 0) {
            $sql .= "WHERE itodo = {$itodo}";
        };
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
}