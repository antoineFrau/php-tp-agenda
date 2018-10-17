<?php
namespace agenda;

//header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1	); // 0 No show errors, 1

// User Controller
require_once './UserController.php';
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
            $res = $user->create($name);
        break;
    case 'update_user';
            $user = new UserController();
            $name = filter_input(INPUT_POST, "name");
            $id = filter_input(INPUT_POST, "id_user");
            if ($name == NULL || $id == NULL) {
                echo json_encode(JsonResult::failledReturn("Missing parametters"));
                return;
            }
            $res = $user->update($id, $name);
        break;
    case 'delete_user';
            $user = new UserController();
            $id = filter_input(INPUT_POST, "id_user");
            if ($id == null) {
                echo json_encode(JsonResult::failledReturn("Missing parametters"));
                return;
            }
            $res = $user->delete($id);
        break;
    case 'users';
            $user = new UserController();
            $res = $user->create(filter_input(INPUT_POST, "name"));
        break;
    /*                                  EVENT ROUTE                           */
    case 'events';
            $user = new UserController();
            $res = $user->login( filter_input(INPUT_POST, "user"), filter_input(INPUT_POST, "password") );
            echo $res;
        break;
    case 'create_event';
            $user = new UserController();
            $res = $user->login( filter_input(INPUT_POST, "user"), filter_input(INPUT_POST, "password") );
            echo $res;
        break;
    case 'delete_event';
            $user = new UserController();
            $res = $user->login( filter_input(INPUT_POST, "user"), filter_input(INPUT_POST, "password") );
            echo $res;
        break;
    default:
        break;
}