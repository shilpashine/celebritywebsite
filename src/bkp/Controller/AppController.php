<?php
 
namespace App\Controller;
 
use Cake\Controller\Controller;
use Cake\Event\Event;
 
class AppController extends Controller {
 
    public function initialize() {
        parent::initialize();
 
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        
 
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
                
            ]
        ]);
    }
	 public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['display','add','login','logout','index','admin_login','dashboard']);
         
         $this->set('page_title', 'Celebrity| Admin Dashboard');
         $this->set('meta_content', 'Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports');
    }
   
 
}
 
?>