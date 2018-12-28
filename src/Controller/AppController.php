<?php
 
namespace App\Controller;
use Cake\Controller\Controller;
use Cake\Event\Event;
class AppController extends Controller {
 
    public function initialize() {
          parent::initialize();
 
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadModel('Users');
 
       $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
              
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
                
            ],
            'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'username']
           ]
        ]
            
        ]);
       
         if($this->Auth->user()) {  
            // $session = $this->request->session();
        $AuthUser = $this->Auth->user();
        $this->set('AuthUser', $AuthUser);
       //pr($AuthUser);exit;
}
    }
    
	 public function beforeFilter(Event $event)
    {
           

        $this->Auth->allow(['display','add','login','logout','index','editProfile','dashboard']);
        
         $this->set('page_title', 'Party With Star | Admin Dashboard');
         $this->set('meta_content', 'Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports');
    }
   
 
}
 
?>