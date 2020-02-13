<?php

use App\Utility\Http\Http;

class MusicService{
    public function __construct()
    {
    }

    public function getArtist($data = null, $token = null){
        $parameters = [
                        "q" => $data,
                        "type" => "artist"
                    ];
        $headers = [
            'Authorization' => 'Bearer '.$token,
            'Content-Type' => 'application/json',
        ];
        $response = Http::http_connection('GET', "https://api.spotify.com/v1/search", $parameters, $headers);
        if(!isset($response->getJson()['artists']['items'][0])){
            $artist = null;
        }else{
            $result = $response->getJson()['artists']['items'][0];
            $artist = [
                "id" =>  $result['id'],
                "name" => $result['name'],
                "uri" => $result['uri'],
                "followers" => $result['followers']['total'],
                "images" => [
                    $result['images']
                ]
            ];
        }
        return json_encode($artist);
        
        
    }

    public function getAlbums($data = null, $token = null){
        $parameters = [
            "q" => $data,
            "type" => "artist"
        ];
        $headers = [
            'Authorization' => 'Bearer '.$token,
            'Content-Type' => 'application/json',
        ];
    }
   
}

