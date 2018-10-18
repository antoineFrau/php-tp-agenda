<?php
namespace agenda;

//header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1	); // 0 No show errors, 1

// User Controller
require_once './UserController.php';
require_once './EventController.php';
require_once '../model/JsonResult.php';

$route = filter_input(INPUT_POST, "route");
if ($route == NULL) {
    $route = filter_input(INPUT_GET, "route");
}

switch ($route){
    /*                                  USER ROUTE                           */
    case 'create_user';
            $user = new UserController();
            $name = filter_input(INPUT_POST, "name");
            if($name == NULL){
                echo json_encode(JsonResult::failledReturn("Missing parametters"));
                return;
            }
            $user->create($name);
        break;
    case 'update_user';
            $user = new UserController();
            $name = filter_input(INPUT_POST, "name");
            $id = filter_input(INPUT_POST, "id_user");
            if ($name == NULL || $id == NULL) {
                echo json_encode(JsonResult::failledReturn("Missing parametters"));
                return;
            }
            $user->update($id, $name);
        break;
    case 'delete_user';
            $user = new UserController();
            $id = filter_input(INPUT_POST, "id_user");
            if ($id == NULL) {
                echo json_encode(JsonResult::failledReturn("Missing parametters"));
                return;
            }
            $res = $user->delete($id);
        break;
    case 'users';
            $user = new UserController();
            $user->get_users();
        break;
    /*                                  EVENT ROUTE                           */
    case 'events';
            $event = new EventController();
            $event->get_events();
        break;
    case 'create_event';
            $event = new eventController();
            $title = filter_input(INPUT_POST, "title");
            $date_start = filter_input(INPUT_POST, "date_start");
            $date_end = filter_input(INPUT_POST, "date_end");
            if ($title == NULL || $date_start == NULL || $date_end == NULL) {
                echo json_encode(JsonResult::failledReturn("Missing parametters"));
                return;
            }
            $event->create($title, $date_start, $date_end);
        break;
    case 'update_event';
            $event = new eventController();
            $id = filter_input(INPUT_POST, "id_event");
            $date_start = filter_input(INPUT_POST, "date_start");
            $date_end = filter_input(INPUT_POST, "date_end");
            if($id == NULL || $date_start == NULL || $date_end == NULL){
                echo json_encode(JsonResult::failledReturn("Missing parametters"));
                return;
            }
            $event->update($date_start, $date_end, $id);
        break;
    default:
        break;
}