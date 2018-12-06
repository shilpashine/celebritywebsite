<?php
namespace App\Controller\Supplier;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class DashboardsController extends AppController {
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		$user = $this->Auth->User();
		  if(!empty($user)){
			  if($user['user_type']!=3){
				return $this->redirect($this->Auth->logout());
				//$this->Flash->error(__('You Are Not Authorized To Access This Area!'));			
			  }
			  else{
				 $this->Auth->allow(['login','logout','index']); 
				}
		    }
			  else{
			  $this->Auth->allow(['login','logout','index']);
		   }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Users');
        $this->loadComponent('RequestHandler');
    } 
    //Below are basic crud methods of UsersController
	public function index() {
	  $user_data = $this->Auth->User();
	  if(!empty($user_data)){
	  $this->viewBuilder()->setLayout('dashboard');
	  $datas=$this->Users->get($user_data['id'], array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
                'Users.id' => 'DESC'
            )
        ));
	  //pr($user);exit;
	  $user= $datas->toArray();
      $this->set('user',json_encode($user));
	  }
	  else{
      $this->redirect(array("controller"=>"users","action"=>"login"));
	  }	 
    }
}
?>