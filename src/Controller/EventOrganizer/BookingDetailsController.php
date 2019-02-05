<?php
namespace App\Controller\EventOrganizer;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class BookingDetailsController extends AppController {
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	    $user = $this->Auth->User();
	    if(!empty($user)){
		  if($user['user_type']!=4){
			return $this->redirect($this->Auth->logout());
	        }
		  else{
			 	$this->Auth->allow(['editProfile','bookingDetails','viewDetails','eventDetailBooking']);
 
		    }
	    }
	    else{
			 $this->Auth->allow(['editProfile','listLead','viewRemark']);

	    }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Users');
		 $this->loadModel('Categories');
                 $this->loadModel('EventDetails');
                 $this->loadModel('EventCelebrities');
                 $this->loadModel('EventVideos');
                  $this->loadModel('EventPhotos');
                   $this->loadModel('EventOrganizers');
                   $this->loadModel('EventTicketDetails');
                  
                  $this->loadModel('CelebrityDetails');
                  $this->loadModel('CelebrityVideos');
                $this->loadModel('CelebrityCategories');
               $this->loadModel('CelebrityPhotos');
             
              $this->loadModel('EventOrders');
                $this->loadModel('EventPhotos');
                  $this->loadModel('EventVideos');
                    $this->loadModel('EventTicketCodeDetails');
             
                  
                      
                 //   'EventCategories','EventCelebrities','EventOrganizers'
              
        $this->loadComponent('RequestHandler');
    } 
	  public function viewDetails($id=NULL){
	  $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
         
         
              $data_all=$this->EventDetails->get($id, array(
         'recursive' => -1,
		'contain'=>array('EventOrganizers'=>array('conditions'=>array('EventOrganizers.isdeleted' =>0,'EventOrganizers.organizer_id' =>$userdata['id'])),'EventOrders'=>array('Users','EventTicketCodeDetails'=>['EventTicketDetails'])),
	    'conditions'=>array(
		'EventDetails.isdeleted' =>0,
              //  'EventDetails.id'=>$id
				
                ),
                'order' => array(
                'EventDetails.id' => 'DESC'
                )
        ));
         
         
         
//              $data_all=$this->EventOrders->find('all', array(
//         'recursive' => -1,
//		'contain'=>array('EventDetails'=>array('conditions'=>array('EventDetails.id'=>$id)),'Users'),
//	    'conditions'=>array(
//		'EventOrders.isdeleted' =>0,
//                
//				
//                ),
//                'order' => array(
//                'EventOrders.id' => 'DESC'
//                )
//        ));
		$data_all = $data_all->toArray();
             
                if(!empty($data_all)){
		$this->set('data_all',json_encode($data_all));
              
		}
      //  pr($data_all);exit;
                
           
              
		   
        }      
               
       
    }
    
     public function eventDetailBooking(){
	  $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
              $data_all=$this->EventDetails->find('all', array(
         'recursive' => -1,
		'contain'=>array( 'EventOrganizers'=>array('conditions'=>array('EventOrganizers.isdeleted' =>0,'EventOrganizers.organizer_id' =>$userdata['id'])),'EventOrders'=>array('EventTicketCodeDetails'=>['EventTicketDetails'],'Users')),
	    'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                
				
                ),
                
                'order' => array(
                'EventDetails.id' => 'DESC'
                )
        ));
		$data_all = $data_all->toArray();
             
                if(!empty($data_all)){
		$this->set('data_all',json_encode($data_all));
              
		}
      //  pr($data_all);exit;
                
           
              
		   
        }      
               
       
    }
    
      public function bookingDetails($id=NULL){
	  $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
              $data_all=$this->EventOrders->get($id, array(
         'recursive' => -1,
		'contain'=>array('EventTicketCodeDetails'=>['EventTicketDetails']),
	    'conditions'=>array(
		'EventOrders.isdeleted' =>0,
                'EventOrders.id' =>$id
				
                ),
                'order' => array(
                'EventOrders.id' => 'DESC'
                )
        ));
		$data_all = $data_all->toArray();
          //   pr($data_all);exit;
                if(!empty($data_all)){
		$this->set('data_all',json_encode($data_all));
              
		}
//  pr($data_all);exit;
                
           
              
		   
        }      
               
       
    }
    
    
 	 
}
?>