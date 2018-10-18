<?php
namespace agenda;

require_once '../config/properties.php';
require_once '../model/UserModel.php';

class UserController{
    
    public function __construct() {        
    }
    
    public function create($name){
        $user = new UserModel;
        $user->setName($name);
        $response = $user->create();
        echo json_encode($response);
    }
    
    public function update($id, $name){
        $user = new UserModel;
        $user->setName($name);
        $user->setId($id);
        $response = $user->update();
        echo json_encode($response);
    }
    
    public function delete($id){
        $user = new UserModel;
        $user->setId($id);
        $response = $user->delete();
        echo json_encode($response);
    }

    public function get_users(){
        $user = new UserModel;
        $response = $user->get_users();
        echo json_encode($response);
    }
    
}

