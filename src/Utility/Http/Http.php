<?php
namespace App\Utility\Http;

use Cake\Http\Client;
use Cake\Core\Configure;
use Cake\Core\Exception\Exception;
use Cake\Log\Log;
class Http{
    
    public static function http_connection($method, $url, $parameters = [], $headers = [], $type = "json"){
        $http = new Client();
        try {
            if($method == "GET"){
                $response = $http->get($url, $parameters,['headers' => $headers, 'type' => $type]);         
            }
            if($method == "POST"){
                $response = $http->post($url, $parameters,['headers' => $headers, 'type' => $type]);
            }
            return $response;
        } catch (Exception $e) {
            Log::write('error', 'COULD NOT RESOLVE HOST: '.$url.', API ERROR');
            echo json_encode(['error' => "503 Service Unavailable"]);
            header("HTTP/1.1 503 Service Unavailable");
            exit;
        }
    }
}
