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
        if($response->getJson()['artists']['total'] == 0){
            $artist = ['error' => "Artist not found"];
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

    public function getAlbums($artist = null, $token = null){
        $artist = json_decode($artist, true);
        if(isset($artist['error'])){
            return json_encode($artist);
        }else{
            $parameters = [
                'limit' => 20
            ];
            $headers = [
                'Authorization' => 'Bearer '.$token,
                'Content-Type' => 'application/json',
            ];
            $response = Http::http_connection('GET', "https://api.spotify.com/v1/artists/".$artist['id']."/albums", $parameters, $headers);
            $result = $response->getJson();
            if($result['total'] == 0){
                $albums = ['error' => "Albums not found"];
            }else{
                $albums = [];
                foreach($result['items'] as $album){
                    $album_to_push = [
                        'name' => $album['name'],
                        'released' => $album['release_date'],
                        'tracks' => $album['total_tracks'],
                        'cover' => [
                            'height' => $album['images'][0]['height'],
                            'width' => $album['images'][0]['width'],
                            'url' => $album['images'][0]['url'],
                        ]
                        
                    ];
                    array_push($albums, $album_to_push);
                }
                
            }
            return json_encode($albums);
        }
    }
   
}

