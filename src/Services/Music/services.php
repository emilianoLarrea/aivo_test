<?php

use App\Utility\Auth\Auth;

class MusicService{
    public function __construct()
    {
    }

    public function getAlbums($data = null, $token = null){
        return Auth::refreshToken();
    }
   
}

