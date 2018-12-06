<?php
namespace App\Controller\Franchise;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class OperatorsController extends AppController {
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		$this->Auth->allow(['add','login','logout','index','indexAjax','menu','editProfile']);
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Users');
		$this->loadModel('Menus');
        $this->loadComponent('RequestHandler');
    } 
    //Below are basic crud methods of UsersController
}
?>