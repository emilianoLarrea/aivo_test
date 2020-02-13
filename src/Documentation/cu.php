
<?php 
    /**
     * getAlbums::Services/Music/services.php
     * 
        * @apiDefine TokenResponse
        *
        * @apiSuccessExample {json} Respuesta
        *     HTTP/1.1 200 OK
        *    [{
        *          "name": "Album Name",
        *          "released": "10-10-2010",
        *          "tracks": 10,
        *          "cover": {
        *              "height": 640,
        *              "width": 640,
        *              "url": "https://i.scdn.co/image/6c951f3f334e05ffa"
        *          }
        *      },
        *      ...
        *     ] 
        */
        /**
        * @api {get} /api/v1/albums?q=<band-name>  Obtener Albumes de un Artista
        * @apiName Obtener Albumes de un Artista
        * @apiGroup Musica
        *
        * @apiDescription Se encarga de obtener todos los albumes relacionados a un artista especificado por el usuario.
        
        *
        * @apiUse TokenResponse
        * @apiUse QueryValidationErrors
        * @apiUse OtherErrors
        *
     */