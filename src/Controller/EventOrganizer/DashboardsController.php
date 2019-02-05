<?php
namespace App\Controller\EventOrganizer;
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
		  if($user['user_type']!=4){
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
         $this->loadModel('OrganizerCelebrities');
         $this->loadModel('EventOrganizers');
         
         $this->loadModel('EventDetails');
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
        
           $user_cele=$this->OrganizerCelebrities->find('all', array(
         'recursive' => -1,
		 'contain' => array(
                     'CelebrityDetails'=>array('conditions'=>array(
				'CelebrityDetails.isdeleted' =>0,
                'CelebrityDetails.status' =>1
				
                ))
	    ),
	    'conditions'=>array(
		'OrganizerCelebrities.isdeleted' =>0,
                'OrganizerCelebrities.user_id' =>$id
				
                ),
                'order' => array(
                'CelebrityDetails.id' => 'DESC'
                )
        ));
		$userdatas = $user_cele->toArray();
               
                $m=0;
                if(!empty($userdatas)){
              foreach($userdatas as $val){
                  if(!empty($val->celebrity_detail)){
                      $m++;
                  }
                  
              }
                }
		
		if(!empty($userdatas)){
                $count_data= $m;
		$this->set('count_data',json_encode($count_data));
		}else{
                    $count_data=0;
                    $this->set('count_data',json_encode($count_data));
                }
          
              $user_org=$this->EventOrganizers->find('all', array(
         'recursive' => -1,
		 'contain' => array(
                     'EventDetails'=>array('conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.status' =>1
				
                ),
	    )),
	    'conditions'=>array(
		'EventOrganizers.isdeleted' =>0,
                'EventOrganizers.organizer_id' =>$id
				
                ),
                'order' => array(
                'EventOrganizers.id' => 'DESC'
                )
        ));
		$userorg = $user_org->toArray();  
                $k=0;
               // pr($userorg);exit;
                foreach($user_org as $val){
             // pr($val);exit;
                
               if(!empty($val->event_detail)) {
                  $k++;
               }
                
	  }
          $this->set('count_event',json_encode($k));
        
          }else{
      $this->redirect(array("controller"=>"users","action"=>"login"));
	  }
          
          
           
    }
}
?>