<?php
namespace agenda;
class JsonResult {
    public static $json;

    public static function succeededReturn() {
        $json = new \stdClass;
        $json->code = 200;
        $json->message = "Request Succeeded";
        return $json;
    }
    
    public static function succeededDataReturn($data) {
        $json = new \stdClass;
        
        $datas = (object) $data;

        $json->code = 200;
        $json->data = $datas;
        $json->message = "Request Succeeded";
        return $json;
    }

    public static function failledReturn($error) {
        $json = new \stdClass;

        $errors = (object) $error;
        
        $json->code = 404;
        $json->error = $errors;
        $json->message = "Request Failled";
        return $json;
    }
}
