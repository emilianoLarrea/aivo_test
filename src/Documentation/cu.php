<?php 
    /**
     * getArtist::Services/Music/services.php
     * 
        * @apiDefine TokenResponse
        *
        * @apiSuccessExample {json} Respuesta
        *     HTTP/1.1 200 OK
        *    {
        *          "id": "Artist ID",
        *          "name": "Artist Name",
        *          "uri": "Spotify Artist Uri",
        *          "followers": "Artist followers quantity",
        *          "images": [{
        *              "height": "Image Height",
        *              "width": "Image Width",
        *              "url": "Image url"
        *          },
        *          ...
        *          ]
        *      }
        *     
        */
        /**
        * @api {get} /api/v1/artist?q=<band-name/artist-name>  Buscar un Artista
        * @apiName Obtiene información de un artista
        * @apiGroup Musica
        *
        * @apiDescription Se encarga de obtener información relacionada a un artista especificado por el usuario.
        
        *
        * @apiUse TokenResponse
        * @apiUse QueryValidationErrors
        * @apiUse OtherErrors
        *
     */

    /**
     * getAlbums::Services/Music/services.php
     * 
        * @apiDefine TokenResponse2
        *
        * @apiSuccessExample {json} Respuesta
        *     HTTP/1.1 200 OK
        *    [{
        *          "name": "Album Name",
        *          "released": "10-10-2010",
        *          "tracks": 10,
        *          "cover": {
        *              "height": "Image Height",
        *              "width": "Image Width",
        *              "url": "Image url"
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
        * @apiUse TokenResponse2
        * @apiUse QueryValidationErrors
        * @apiUse OtherErrors
        *
     */