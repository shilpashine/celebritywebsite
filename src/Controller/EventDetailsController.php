<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
//use Cake\Core\App;
use Cake\ORM\TableRegistry;
//use Cake\Network\Session\DatabaseSession;
use Cake\Routing\Router;
//namespace App\Http\Session;

use Cake\Event\Event;
class EventDetailsController extends AppController {
          
    public function beforeFilter(Event $event)
               { 
          $user = $this->Auth->User();
                if(!empty($user)){
                  
                             if($user['user_type']!=1){
                                   return $this->redirect($this->Auth->logout());

                           }
                             else{
                                    $this->Auth->allow(['login','logout','eventList','replaceTab','swapTab','eventDetail','thankyou','commentUser','faqAdd']);

                             }

               }
                  else{
                                    $this->Auth->allow(['register','login','eventList','replaceTab','swapTab','eventDetail',]);

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
             
              $this->loadModel('EventCategories');
              $this->loadModel('EventPhotos');
              $this->loadModel('EventVideos');
             $this->loadModel('EventTicketCodeDetails');
                $this->loadModel('EventTicketDetails');
                $this->loadModel('EventOrders');
                 $this->loadModel('EventComments');
              $this->loadModel('EventFaqs');
              $this->loadModel('TaxDetails');
                $this->loadModel('EventCopyDetails');
                  
                      
                 //   'EventCategories','EventCelebrities','EventOrganizers'
              
        $this->loadComponent('RequestHandler');
    } 
	
  
    
    public function eventList(){
        $date1=date('Y-m-d');
        
        $data_all_event=$this->EventDetails->find('all', array(
         'recursive' => -1,
		  'contain' => array('EventPhotos','EventOrders','EventCategories'=>array('Categories'),'EventOrganizers'=>['Users']),
	    'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.status' =>1,
                'EventDetails.event_city' =>$this->request->session()->read('visitor.city'),
               'EventDetails.approx_start_date >' => $date1 
			
                ),
                     
                'order' => array(
                'EventDetails.id' => 'DESC'
                )
        ));
            
		$data_all_event = $data_all_event->toArray();
            //   pr($data_all_event);exit;
                if(!empty($data_all_event)){
		$this->set('data_all_event',$data_all_event);
            
		}
         if($this->request->is("post") or $this->request->is("put")){
                $city=$this->request->data["event_city"];
              
               
               $data_all_event=$this->EventDetails->find('all', array(
         'recursive' => -1,
		  'contain' => array('EventPhotos','EventOrders','EventCategories'=>array('Categories'),'EventOrganizers'=>['Users']),
	    'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.status' =>1,
                 'EventDetails.event_city LIKE' =>"%".$city."%",
               'EventDetails.approx_start_date >' => $date1 
			
                ),
                     
                'order' => array(
                'EventDetails.id' => 'DESC'
                )
        ));
            
		$data_all_event = $data_all_event->toArray();
        //    pr($data_all_event);exit;
                if(!empty($data_all_event)){
		$this->set('data_all_event',$data_all_event);
            
		}
               
               
         }
    }
     public function eventDetail($id=NULL){
         
         if(!empty($id)){
             $this->set('id',($id));
             
            
           //  $read_event_id=$this->request->session()->read('eventdetail.current_event_detail_id');
             
            
           $this->viewBuilder()->setLayout('default1');
            	
        $date1=date('Y-m-d');
        
        
        $data_all_event=  $this->EventDetails->get($id, array(
         'recursive' => -1,
		  'contain' => array('EventPhotos','EventOrders','EventTicketDetails','EventCategories'=>array('Categories'),'EventOrganizers'=>['Users']),
	    'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.status' =>1,
               'EventDetails.id' => $id 
			
                ),
                     
                'order' => array(
                'EventDetails.id' => 'DESC'
                )
        ));
 
        
        
		$data_all_event = $data_all_event->toArray();
          //    pr($data_all_event);exit;
                if(!empty($data_all_event)){
		$this->set('data_all_event',json_encode($data_all_event));
            
		}
                
      $data_all_eventhistory=  $this->EventCopyDetails->find('all', array(
         'recursive' => -1,
	   'conditions'=>array(
		'EventCopyDetails.isdeleted' =>0,
                'EventCopyDetails.status' =>1,
               'EventCopyDetails.event_id' => $id 
			
                ),
                     
                'order' => array(
                'EventCopyDetails.id' => 'DESC'
                )
        ));
 
        
        
		$data_history = $data_all_eventhistory->toArray();
           //  pr($data_history);exit;
                if(!empty($data_history)){
		$this->set('data_history',($data_history));
            
		}

                    
                
                
                
      $data_all_comment=$this->EventDetails->find('all', array(
         'recursive' => -1,
		  'contain' => array('EventComments'=>array('conditions'=>array('EventComments.status' =>1,'EventComments.isdeleted' =>0))),
	    'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.id' =>$id
               
                ),
                     
                'order' => array(
                'EventDetails.id' => 'DESC'
                )
        ));
            
		$data_all_comment = $data_all_comment->toArray();
           //   pr($data_all_comment);exit;
                if(!empty($data_all_comment)){
		$this->set('data_all_comment',$data_all_comment);
            
		}           
                  $this->request->session()->write('eventdetail.current_event_detail_id',$id);
             
  if($this->request->is("post") or $this->request->is("put")){
           
    
        
     $userdata=$this->Auth->User();	
    if(!empty($userdata)){		
                    
                $datas15=$this->EventTicketDetails->find('all', array(
                 'recursive' => -1,
                    'conditions'=>array(
                     'EventTicketDetails.event_detail_id' =>$id,
                     'EventTicketDetails.id' =>$this->request->data["ticket_id"]
                    )

                       ));
                            $datas15 = $datas15->toArray();
       
                     
                     
                $qty=$this->request->data["qty"];
                $ticket_id=$this->request->data["ticket_id"];
                   $avl_ticket=$datas15[0]['ticket_avl']-$this->request->data["qty"];
                   if($avl_ticket >=0){
                    $date=explode('T', $data_all_event["approx_start_date"]);
                  //  pr($date);exit;
                   $eventTable11 = TableRegistry::get('EventOrders');
                    $ticketevent = $eventTable11->newEntity();
                      
                    $ticketevent->event_id=$id;
                    $ticketevent->event_name=$data_all_event["event_title"];
                    $ticketevent->event_desc=$data_all_event["event_description"];
                    $ticketevent->total_ticket_qty=$qty;
                    $ticketevent->user_id=$userdata["id"];
                 //   $ticketevent->org_id=$this->request->data["ticket_id"];
                    $ticketevent->event_date= date("Y-m-d", strtotime($date[0]));
                    $ticketevent->location=$data_all_event["event_location"];
                    
                      $ticketevent->total_price=($qty*$datas15[0]['ticket_price'])+(($qty*$datas15[0]['ticket_price'])*.18); 
                $ticketevent->product_price=$qty*$datas15[0]['ticket_price'];
                        $ticketevent->created=date("Y-m-d");
                        $ticketevent->modified=date("Y-m-d");
                       // pr($ticket);exit;
                 $user1_order=    $this->EventOrders->save($ticketevent);
                  $insertedIdorder = $user1_order->id;
               // echo $datas15[0]['ticket_price'];exit;
                 $this->request->session()->write('visitor.ticket_id', $insertedIdorder);
                   // $this->Session->write('event.qty', $this->request->data["qty"]);
                   // $this->Session->write('event.price', $datas15[0]['ticket_price']);
                   // $this->Session->write('event.startcode', $datas15[0]['ticket_start_code']);
                   //$this->Session->write('event.endcode', $datas15[0]['ticket_start_code']);
                   // $this->Session->write('event.avl', $datas15[0]['ticket_avl']);  
                  
                    
                    for($k=0;$k<$this->request->data["qty"];$k++){
                        
                    $new_code=explode('-',$datas15[0]['ticket_start_code']);
                    $half_new=$new_code[1];
                    $end_code=$half_new+$this->request->data["qty"];
                    $half_new1=$half_new+$k;
                 
                    $catsTable11 = TableRegistry::get('EventTicketCodeDetails');
                    $ticket1 = $catsTable11->newEntity();
                      
                    $ticket1->event_ticket_detail_id=$this->request->data["ticket_id"];
                         $sq=sprintf('%04u', $half_new1);
                      $ticket1->event_detail_id=$id; 
                      $ticket1->ticket_code=$new_code[0].'-'.$sq;
                      $ticket1->qty=1; 
                       $ticket1->price=$datas15[0]['ticket_price'];
                        $ticket1->event_order_id=$insertedIdorder;
                      
                      // pr($this->request->data["ticket_name"]);exit;
                        $ticket1->created=date("Y-m-d");
                        $ticket1->modified=date("Y-m-d");
                       // pr($ticket);exit;
                    $this->EventTicketCodeDetails->save($ticket1);
                    }
                    
                    $usersTable = TableRegistry::get('EventTicketDetails');
           
                      $user = $usersTable->get($this->request->data["ticket_id"]);
                      $end_code1=sprintf('%04u', $end_code);
                      $user->ticket_start_code=$new_code[0].'-'.$end_code1;
                      
                        $user->ticket_avl=$avl_ticket;
			
                      $user1= $this->EventTicketDetails->save($user);
                       $this->redirect(array("controller"=>"event-details","action"=>"thankyou"));

                }
                }
             
    }
    
    
         }else{
              $this->redirect(array("controller"=>"pages","action"=>"index"));
         }
     }
     
     public function commentUser(){
          $userdata=$this->Auth->User();	
        if(!empty($userdata)){	
            $id=$userdata['id'];
       
        if(!empty($id)){
          // $this->viewBuilder()->setLayout('default1');
            	
        $date1=date('Y-m-d');
        $usersTable = TableRegistry::get('EventComments');
        $user = $usersTable->newEntity();
        $user->name=$this->request->data["name"];
	$user->website=$this->request->data["website"];
        $user->email=$this->request->data["email"];
        $user->event_id=$this->request->data["event_id"];
        $user->message=$this->request->data["event_comment"];
        $user->user_id=$this->request->data["auth_id"];
        $user->created=$date1;
        $user->modified=$date1;
        
        if($this->EventComments->save($user)){
             $this->Flash->set('Comments Added Successfully');
		  $this->redirect(array("controller"=>"event-details","action"=>"event_detail",$this->request->data["event_id"])); 
        }
        }
        
        else{
            $this->redirect(array("controller"=>"pages","action"=>"index"));
        }
          }
     }
     
     public function faqAdd(){  
    
    $userdata=$this->Auth->User();	
        if(!empty($userdata)){	
            $id=$userdata['id'];
       
        if(!empty($id)){
          // $this->viewBuilder()->setLayout('default1');
            	
        $date1=date('Y-m-d');
        $usersTable = TableRegistry::get('EventFaqs');
        $user = $usersTable->newEntity();
        
        $user->event_id=$this->request->data["event_new_id"];
        $user->message=$this->request->data["event_faq"];
        $user->user_id=$this->request->data["user_id"];
        $user->created=$date1;
        $user->modified=$date1;
        
        if($this->EventFaqs->save($user)){
             $this->Flash->set('Faq Added Successfully');
		  $this->redirect(array("controller"=>"event-details","action"=>"event_detail",$this->request->data["event_new_id"])); 
        }
        }
        
        else{
            $this->redirect(array("controller"=>"pages","action"=>"index"));
        }
          }
    
    
  }
     
     public function thankyou(){
          $this->viewBuilder()->setLayout('ajax');
           $userdata=$this->Auth->User();	
           //  pr($userdata);exit;
    //    $this->autoRender = false;
  if(!empty($this->request->session()->read('visitor.ticket_id'))){
                     
                $lastid=$this->request->session()->read('visitor.ticket_id');
                
  }
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
                
              
       
          //  $usersTable = TableRegistry::get('EventTicketCodeDetails');
            
         
            
     }
}
}
?>