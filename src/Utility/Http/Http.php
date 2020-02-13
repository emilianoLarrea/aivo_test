<?php
namespace App\Utility\Http;

use Cake\Http\Client;
use Cake\Core\Configure;


class Http{
    
    public static function http_connection($method, $url, $parameters = [], $headers = [], $type = "json"){

        $http = new Client();

        if($method == "GET"){
            $response = $http->get($url, $parameters,['headers' => $headers, 'type' => $type]);         
        }
        if($method == "POST"){
            $response = $http->post($url, $parameters,['headers' => $headers, 'type' => $type]);
        }
        
        return $response;
    }
}
