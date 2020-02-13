<?php
namespace App\Utility\Data;

class Data{
    
    public static function validateQuery($data = null){
        if(isset($data['q']) AND $data['q']!= ''){
            //Futuras validaciones requeridas
            return $data['q'];
        }else{
            echo '{"path" : "q",
                   "message" : "Is Null"
                  }';
            header("HTTP/1.1 400 Bad Request");
            exit;
        }
    }
}
