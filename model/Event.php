<?php
namespace agenda;
class Event {    

    private $id;
    private $title;
    private $date_start;
    private $date_end;
    private $localisation;
    private $organisator;
    private $participants;
                   
    public function __construct(){
        
    }
    
    function getId() {
        return $this->id;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function getTitle() {
        return $this->title;
    }
    
    function setTitle($title) {
        $this->title = $title;
    }
    
    function getDateStart() {
        return $this->date_start;
    }
    
    function setDateStart($date_start) {
        $this->date_start = $date_start;
    }
    
    function getDateENd() {
        return $this->date_end;
    }
    
    function setDateEnd($date_end) {
        $this->date_end = $date_end;
    }
    
    function getOrganisator() {
        return $this->organisator;
    }
    
    function setOrganisator($organisator) {
        $this->organisator = $organisator;
    }
    
    function getParticipants() {
        return $this->participants;
    }
    
    function setParticipants($participants) {
        $this->participants = $participants;
    }
}
