<?php
namespace agenda;
class User {    
    private $id;
    private $name;
                   
    public function __construct(){
        
    }
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

}
