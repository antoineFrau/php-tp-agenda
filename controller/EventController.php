<?php
namespace agenda;

require_once '../config/properties.php';
require_once '../model/EventModel.php';

class EventController{
    
    public function __construct() {        
    }

    public function create($title, $date_start, $date_end)
    {
        $event = new EventModel;
        $event->setTitle($title);
        $event->setDateStart($date_start);
        $event->setDateEnd($date_end);
        $response = $event->create();
        echo json_encode($response);
    }

    public function update($date_start, $date_end, $id)
    {
        $event = new EventModel;
        $event->setId($id);
        $event->setDateStart($date_start);
        $event->setDateEnd($date_end);
        $response = $event->update();
        echo json_encode($response);
    }

    public function get_events()
    {
        $event = new EventModel;
        $response = $event->get_events();
        echo json_encode($response);
    }
    
}

