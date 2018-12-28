<?php
namespace App\Controller\Admin;
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
		  if($user['user_type']!=0){
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
                
                $this->loadModel('CelebrityDetails');
                  $this->loadModel('EventDetails');
                
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
      
      
      $allcelebrity = $this->CelebrityDetails->find('all', 
                     array('conditions' => array('CelebrityDetails.status' => 1,'CelebrityDetails.isdeleted' => 0)));
 
        $countcelebrity= $allcelebrity->toArray();
     $newaray=count($countcelebrity);
      $this->set('newaray',$newaray);
     
       $event_total = $this->EventDetails->find('all', 
                     array('conditions' => array('EventDetails.status' => 1,'EventDetails.isdeleted' => 0,'EventDetails.event_type' => 1)));
 
        $countpublic= $event_total->toArray();
     $newevent=count($countpublic);
      $this->set('newevent',$newevent);
     
      
      
       $event_private = $this->EventDetails->find('all', 
                     array('conditions' => array('EventDetails.status' => 1,'EventDetails.isdeleted' => 0,'EventDetails.event_type' => 2)));
 
        $countprivate= $event_private->toArray();
     $newprivate=count($countprivate);
      $this->set('newprivate',$newprivate);
     
      
      $event_org = $this->Users->find('all', 
                     array('conditions' => array('Users.status' => 1,'Users.is_deleted' => 0,'Users.user_type' => 4)));
 
        $countorg= $event_org->toArray();
     $neworg=count($countorg);
      $this->set('neworg',$neworg);
	  }
	  else{
      $this->redirect(array("controller"=>"users","action"=>"login"));
	  }	  
    }
}
?>