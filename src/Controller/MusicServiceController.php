<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utility\Auth\Auth;
use App\Utility\Data\Data;
/**
 * MusicService Controller
 *
 *
 * @method \App\Model\Entity\MusicService[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MusicServiceController extends AppController
{
    public function getArtist($data = null)
    {
        $this->autoRender = false;
        require_once(ROOT . DS . 'src'. DS  .'Services' . DS  . 'Music' . DS .'services.php');
        $data = Data::validateQuery($this->request->getQuery());
        $token = Auth::getToken();
        $resultJ = \MusicService::getArtist($data, $token);
        $this->response->type('json');
        $this->response->body($resultJ);
        return $this->response;
    }
    public function getAlbums()
    {
        $this->autoRender = false;
        require_once(ROOT . DS . 'src'. DS  .'Services' . DS  . 'Music' . DS .'services.php');
        $data = Data::validateQuery($this->request->getQuery());
        $token = Auth::getToken();
        $resultJ = \MusicService::getAlbums($data, $token);
        $this->response->type('json');
        $this->response->body($resultJ);
        return $this->response;
    }
}
