<?php
namespace agenda;

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

            return $record->execute(array($this->getName(), $this->getId())) ? JsonResult::succeededReturn() :
                JsonResult::failledReturn();
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

    public function login(){
        $pdo = new DBConnection();
        $db = $pdo->DBConnect();
        try{
            $db->beginTransaction();
            $sql = "SELECT * FROM  " . $this->table . " WHERE user =  ? AND password =  ?";
            $record = $db->prepare($sql);
            
            $record->execute( array( $this->getUser() , $this->getPassword() ) );
            $userExist = $record->rowCount();
            if ($userExist) {
                $dataList = $record->fetchAll(PDO::FETCH_ASSOC);
                $db->commit();
                $db = null;
                return $dataList;
            } else {
                $db->commit();
                $db = null;
                return $userExist;
            }            
        }catch (PDOException $exc){
            $db->rollback();
            $db = null;
            echo $exc->getMessage();
            return null;
        }   
    }    
}
