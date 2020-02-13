<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utility\Data\Data;
/**
 * MusicService Controller
 *
 *
 * @method \App\Model\Entity\MusicService[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MusicServiceController extends AppController
{
    public function getAlbums()
    {
        $this->autoRender = false;
        require_once(ROOT . DS . 'src'. DS  .'Services' . DS  . 'Music' . DS .'services.php');
        $data = $this->request->getQuery();
        $data = Data::validateQuery($data);
        $resultJ = \MusicService::getAlbums($data, $accessToken = $this->request->header('Authorization'));
        $this->response->type('json');
        $this->response->body($resultJ);
        return $this->response;
    }
}
