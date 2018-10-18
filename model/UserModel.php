<?php
namespace agenda;
use \PDO;

require_once '../config/DBConnection.php';
require_once 'User.php';
require_once 'JsonResult.php';


class UserModel extends User {
    
    private $table;

    public function __construct() {
        $this->table = "users";
        parent::__construct($this->table);
    }

    public function create(){
        $pdo = new DBConnection();
        $db = $pdo->DBConnect();
        try {
            $sql = "INSERT INTO " . $this->table . "(name) VALUES(?)";
            $record = $db->prepare($sql);

            return $record->execute(array($this->getName())) ? JsonResult::succeededReturn() :
                JsonResult::failledReturn();
            
        } catch (PDOException $exc) {
            return JsonResult::failledReturn($exc->getMessage());
        }   
    }

    public function update(){
        $pdo = new DBConnection();
        $db = $pdo->DBConnect();
        try {
            $sql = "UPDATE " . $this->table . " SET name = ? WHERE id = ?";
            $record = $db->prepare($sql);

            return $record->execute(array($this->getName(), $this->getId())) ? JsonResult::succeededReturn() : JsonResult::failledReturn();
        } catch (PDOException $exc) {
            return JsonResult::failledReturn($exc->getMessage());
        }   
    }

    public function delete(){
        $pdo = new DBConnection();
        $db = $pdo->DBConnect();
        try {
            $sql = "DELETE FROM " . $this->table . " WHERE id = ?";
            $record = $db->prepare($sql);
            return $record->execute(array($this->getId())) ? JsonResult::succeededReturn() :
                JsonResult::failledReturn();
        } catch (PDOException $exc) {
            return JsonResult::failledReturn($exc->getMessage());
        }   
    } 

    public function get_users(){
        $pdo = new DBConnection();
        $db = $pdo->DBConnect();
        try {
            $sql = "SELECT * FROM " . $this->table;
            $record = $db->prepare($sql);

            $users = $record->execute();
            if ($users) {
                $dataList = $record->fetchAll(PDO::FETCH_ASSOC);
                return JsonResult::succeededDataReturn($dataList);
            } else {
                JsonResult::failledReturn();
            }                            
        } catch (PDOException $exc) {
            return JsonResult::failledReturn($exc->getMessage());
        }   
    } 
}
