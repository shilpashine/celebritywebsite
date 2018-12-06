<?php
namespace App\Controller\SalesOperator;
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
		  if($user['user_type']!=2){
			return $this->redirect($this->Auth->logout());
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
	public function index() {
	  $user_data = $this->Auth->User();
	  $id=$user_data['id'];
	  if(!empty($user_data)){
	  $this->viewBuilder()->setLayout('dashboard');
	  //pr($user);exit;
	  $datas=$this->Users->get($id, array(
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
		$user= $datas->toArray();
		//$this->set('user_data',json_encode($user_data));
        $this->set('user',json_encode($user));
	  }
	  else{
      $this->redirect(array("controller"=>"users","action"=>"login"));
	  }	  
    }
}
?>