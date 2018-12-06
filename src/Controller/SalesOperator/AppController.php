<?php
namespace App\Controller\SalesOperator;
use Cake\Controller\Controller;
use Cake\Event\Event;
class AppController extends Controller {
    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		$this->loadModel('users');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'dashboards',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'users',
                'action' => 'login'
            ]
        ]);
    }
	 public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['display','add','login','index','logout','editProfile']);
    }
}
?>