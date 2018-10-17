<?php
namespace agenda;

use \PDO;
require_once 'BDConfig.php'; 
require_once '../model/JsonResult.php';

class DBConnection {
    private $driver;
    private $host;
    private $user;
    private $pass;
    private $database;
    private $charset;
    
    public function __construct() {
        $this->driver   = DB_DRIVER;
        $this->host     = HOST;
        $this->user     = DB_USER;
        $this->pass     = DB_PASSWORD;
        $this->database = DB_NAME;
        $this->port     = DB_PORT;
        $this->charset  = CHARSET;
    }    
    
    function DBConnect() {
        try {
            $db = new PDO($this->driver.":host=".$this->host.";dbname=".$this->database.";port=".$this->port.";charset=".$this->charset, $this->user, $this->pass);
            $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return ($db);
        } catch (PDOException $exc) {
            echo json_encode(JsonResult::failledReturn($exc->getMessage()));
        }
            
    }
    
}
