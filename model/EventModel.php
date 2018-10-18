<?php
namespace agenda;
use \PDO;

require_once '../config/DBConnection.php';
require_once 'Event.php';
require_once 'JsonResult.php';


class EventModel extends Event {
    
    private $table;

    public function __construct() {
        $this->table = "events";
        parent::__construct($this->table);
    }

    public function create(){
        $pdo = new DBConnection();
        $db = $pdo->DBConnect();
        try {
            $sql = "INSERT INTO " . $this->table . "(title, date_start, date_end) VALUES(?, ?, ?)";
            $record = $db->prepare($sql);

            return $record->execute(array($this->getTitle(), $this->getDateStart(), $this->getDateEnd())) ? JsonResult::succeededReturn() : JsonResult::failledReturn();
        } catch (PDOException $exc) {
            return JsonResult::failledReturn($exc->getMessage());
        }   
    }

    public function update(){
        $pdo = new DBConnection();
        $db = $pdo->DBConnect();
        try {
            $sql = "UPDATE " . $this->table . "SET date_start = ?, date_end = ?) where id=?";
            $record = $db->prepare($sql);

            return $record->execute(array($this->getDateStart(), $this->getDateEnd(), $this->getId())) ? JsonResult::succeededReturn() : JsonResult::failledReturn();
        } catch (PDOException $exc) {
            return JsonResult::failledReturn($exc->getMessage());
        }   
    }

    public function get_events(){
        $pdo = new DBConnection();
        $db = $pdo->DBConnect();
        try {
            $sql = "SELECT * FROM " . $this->table; #." JOIN users ON events.organisateur = users.id";
            $record = $db->prepare($sql);

            $events = $record->execute();
            if ($events) {
                $dataList = $record->fetchAll(PDO::FETCH_ASSOC);
                return JsonResult::succeededDataReturn($dataList);
            } else {
                return JsonResult::failledReturn();
            }                            
        } catch (PDOException $exc) {
            return JsonResult::failledReturn($exc->getMessage());
        }   
    } 
}
