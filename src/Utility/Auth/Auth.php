<?php
namespace App\Utility\Auth;

use Cake\Core\Configure;
use App\Utility\Http\Http;

class Auth{
    
    public static function isValidToken($accessToken = null){
        
        $headers = [
            'Authorization' => 'Bearer '.$accessToken,
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
        $response = Http::http_connection("GET", "https://api.spotify.com/v1/me", [], $headers);
        if($response->getStatusCode() != 200){
            return 0;
        } 
        return 1;
    }
    public static function refreshToken(){
        
        Configure::load('config', 'default');
        $refresh_token = Configure::read('refresh_token');
        $client_id = Configure::read('client_id');
        $client_secret = Configure::read('client_secret');
        
        $parameters = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token,
        ];
        $headers = [
            'Authorization' => 'Basic '.base64_encode($client_id . ':' . $client_secret),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
        $response = Http::http_connection("POST", "https://accounts.spotify.com/api/token", $parameters, $headers, 'json');
        
        
        if (isset($response->getJson()["access_token"])){
            Configure::write('auth_token', $response->getJson()["access_token"]);
            Configure::dump('config', 'default', ["client_id", "client_secret", "redirect_uri", "auth_token", "refresh_token", "scope"]);
            return json_encode($response->getJson()["access_token"]);
        }
        if (in_array("error", $response->getJson())){
        echo $response->getJson()['error'].", ".$response->getJson()['error_description'];
        header("HTTP/1.1 401 Unauthorized");
        exit;
        }
    }
    
    public static function getToken(){
        Configure::load('config', 'default');
        $token = Configure::read('auth_token');
        if(strlen($token) == 0 OR Auth::isValidToken($token) == 0){
            $token = Auth::refreshToken();
        }
        return $token;
    }
}
