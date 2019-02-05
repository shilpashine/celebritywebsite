<?php
namespace App\Controller\Admin;
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
		  if($user['user_type']!=0){
			return $this->redirect($this->Auth->logout());
	        }
		  else{
			 	$this->Auth->allow(['editProfile','bookingDetails','viewDetails','eventDetailBooking','changeStatus','ticketlistVisitors','changeStatususer','thankyou']);
 
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
              $this->loadModel('TaxDetails');
                  
                      
                 //   'EventCategories','EventCelebrities','EventOrganizers'
              
        $this->loadComponent('RequestHandler');
    } 
	  public function viewDetails($id=NULL){
	  $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
         
         
              $data_all=$this->EventDetails->get($id, array(
         'recursive' => -1,
		'contain'=>array('EventOrders'=>array('Users','EventTicketCodeDetails'=>['EventTicketDetails'],'conditions'=>array(
		'EventOrders.isdeleted' =>0))),
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
		
                if($this->request->is("post") or $this->request->is("put")){
                      $date1=$this->request->data["date1"];
                      $date2=$this->request->data["date2"];
                      
                    
                      $data_all=$this->EventDetails->get($id, array(
         'recursive' => -1,
		'contain'=>array('EventOrders'=>array('Users','EventTicketCodeDetails'=>['EventTicketDetails'],'conditions'=>array(
		'EventOrders.isdeleted' =>0,
                'EventOrders.created >= ' => $date1,
                 'EventOrders.created <= ' => $date2
              //  'EventDetails.id'=>$id
				
                ))),
	    'conditions'=>array(
		'EventDetails.isdeleted' =>0
               
              //  'EventDetails.id'=>$id
				
                ),
                'order' => array(
                'EventDetails.id' => 'DESC'
                )
        ));
                   
                    
                }
                $data_all = $data_all->toArray();
       //      pr($data_all);exit;
                if(!empty($data_all)){
		$this->set('data_all',json_encode($data_all));
              
		}

                
           
              
		   
        }      
               
       
    }
    
      public function ticketlistVisitors(){
	  $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
         
         
              $data_all=$this->EventOrders->find('all', array(
         'recursive' => -1,
		'contain'=>array('Users','EventTicketCodeDetails'=>['EventTicketDetails']),
                  
	    'conditions'=>array(
		'EventOrders.isdeleted' =>0,
              
				
                ),
                'order' => array(
                'EventOrders.id' => 'DESC'
                )
        ));
         
         $data_all = $data_all->toArray();
             
                if(!empty($data_all)){
		$this->set('data_all',json_encode($data_all));
              
		}

                
           
              
		   
        }      
               
       
    }
    
    
     public function changeStatus($id=NUlL){
       
         $this->autoRender = false ;

        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
       
              $user_datas=$this->EventOrders->get($id, array(
         'recursive' => -1,
		
	    'conditions'=>array(
		'EventOrders.isdeleted' =>0
               
            
				
                ),
                'order' => array(
                'EventOrders.id' => 'DESC'
                )
        ));
        
      
         $usersTable = TableRegistry::get('EventOrders');
         $article = $usersTable->get($id);
         
if($user_datas->status==1){
    $article->status = '0';
}else{
    $article->status = '1';
}
 // Return article with id 12

$usersTable->save($article);
 $this->Flash->set('The data has been successfully updated.');
 $this->redirect(array("controller"=>"booking-details","action"=>"event_detail_booking"));	        

        }
        
        
    }
    
    public function changeStatususer($id=NUlL){
       
         $this->autoRender = false ;

        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
       
              $user_datas=$this->EventOrders->get($id, array(
         'recursive' => -1,
		
	    'conditions'=>array(
		'EventOrders.isdeleted' =>0
               
            
				
                ),
                'order' => array(
                'EventOrders.id' => 'DESC'
                )
        ));
        
      
         $usersTable = TableRegistry::get('EventOrders');
         $article = $usersTable->get($id);
         
if($user_datas->status==1){
    $article->status = '0';
}else{
    $article->status = '1';
}
 // Return article with id 12

$usersTable->save($article);
 $this->Flash->set('The data has been successfully updated.');
 $this->redirect(array("controller"=>"booking-details","action"=>"ticketlist_visitors"));	        

        }
        
        
    }
    
    
     public function eventDetailBooking(){
	  $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
              $data_all=$this->EventDetails->find('all', array(
         'recursive' => -1,
		'contain'=>array('EventOrders'=>array('EventTicketCodeDetails'=>['EventTicketDetails'],'Users','conditions'=>array(
		'EventOrders.isdeleted' =>0,'EventOrders.status' =>1))),
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
     public function thankyou($id=NULL){
         if(!empty($id)){
          $this->viewBuilder()->setLayout('ajax');
           $userdata=$this->Auth->User();	
           //  pr($userdata);exit;
    //    $this->autoRender = false;
  
                     
                $lastid=$id;
                
  
        if(!empty($userdata)){	
            
             $datas=$this->TaxDetails->get(1, array(
         'recursive' => -1,
		
	   
        'order' => array(
                'TaxDetails.id' => 'DESC'
            )
        ));
		$user_data = $datas->toArray();
              //  pr($user_data);exit;
		$this->set('user_data',$user_data);
            
            
       
     
                $data_all=$this->EventOrders->get($lastid, array(
         'recursive' => -1,
		'contain'=>array('EventDetails'=>['EventPhotos'],'EventTicketCodeDetails'=>['EventTicketDetails']),
	    'conditions'=>array(
		'EventOrders.isdeleted' =>0
               
				
                ),
                'order' => array(
                'EventOrders.id' => 'DESC'
                )
        ));
		$data_all = $data_all->toArray();
        //  pr($data_all);exit;
                if(!empty($data_all)){
		$this->set('datass',($data_all));
              
		}
                
        }
       
          //  $usersTable = TableRegistry::get('EventTicketCodeDetails');
            
         
            
     }else{
          $this->redirect(array("controller"=>"booking-details","action"=>"ticketlist_visitors"));	        

         
     }
}
    
    
 	 
}
?>