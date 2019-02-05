<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Event\Event;
class CelebritiesController extends AppController {
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	 
	   
			 $this->Auth->allow(['login','logout','searchNew','listCelebrity','replaceTab','swapTab','celRequest','privateRequest','celebrityDetail','follow','submitRating']);

	    
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Users');
		$this->loadModel('CelebrityDetails');
                $this->loadModel('Categories');
                 $this->loadModel('CelebrityVideos');
                   $this->loadModel('CelebrityPhotos');
                    $this->loadModel('CelebrityCategories');
		$this->loadModel('OrganizerCelebrities');
                $this->loadModel('EventCelebrities');
                  $this->loadModel('EventFollows');
                     $this->loadModel('CelebrityRattings');
                       $this->loadModel('NewsCelebrities');
                        $this->loadModel('NewsDetails');
                        $this->loadModel('CelebrityRequests');
                         $this->loadModel('CelebrityPrivaterequests');
                    
        $this->loadComponent('RequestHandler');
    } 
	
    
        
    public function follow($id=NULL){
        $this->autoRender = false;
        $userdata=$this->Auth->User();	
        $user_id=$userdata['id'];
        $city_name=$userdata['city'];
        if(!empty($userdata)){	
      
              $userid=$user_id;
               $celebrity_id=$id;
               
       $date_user=$this->EventFollows->find('all', array(
         'recursive' => -1,
          'conditions'=>array(
		'EventFollows.user_id' =>$userid,
		'EventFollows.celebrity_detail_id' =>$celebrity_id,		
                ),
               'order' => array(
                'EventFollows.id' => 'DESC'
                )
        ));         
       $data_all = $date_user->toArray();
               if(empty($data_all)){
                $eventTable11 = TableRegistry::get('EventFollows');
               $ticketevent = $eventTable11->newEntity();
               $ticketevent->user_id=$userid;
               $ticketevent->user_city=$city_name;
               $ticketevent->celebrity_detail_id=$celebrity_id; 
               $ticketevent->created=date("Y-m-d");
               $ticketevent->modified=date("Y-m-d");
             if($ticketevent=$this->EventFollows->save($ticketevent)){
                   $this->Flash->set('The data has been successfully saved.');
                   $this->redirect(array("controller"=>"celebrities","action"=>"list-celebrity"));
             }
             
               }else{
                     $this->Flash->set('Already follow this celebrity');
                     $this->redirect(array("controller"=>"celebrities","action"=>"list-celebrity"));
               }
         
        }
        
    }
    
    public function listCelebrity(){
       
         
          $date1=date('Y-m-d');
       $city_visitor=    $this->request->session()->read('visitor.city');
        $this->viewBuilder()->setLayout('default');
          $data_all11=$this->Categories->find('all', array(
         'recursive' => -1,
		
              'contain' => array(
                     'CelebrityCategories'=>array('CelebrityDetails'=>array('EventFollows'=>array('conditions'=>array('EventFollows.user_city'=>$city_visitor)),'CelebrityPhotos','conditions'=>array(
		'CelebrityDetails.isdeleted' =>0,
                'CelebrityDetails.status' =>1
               
              
				
                ))
                             )),
                        
                       
	    'conditions'=>array(
		'Categories.is_deleted' =>0,
                'Categories.status' =>1,
                'Categories.parent_id' =>0
              
				
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
          
       $data_all = $data_all11->toArray();   
           //pr($data_all);exit;
           // $staff_data11_all_new = $datas_all->toArray();
                $array_product=array();
                $array2=array();
                $k=0;
                foreach($data_all as $val_count){
                    foreach($val_count->celebrity_categories as $val_cat){
                    if(!empty($val_cat->celebrity_detail)){
                    $arr_count=count($val_cat->celebrity_detail->event_follows);
     $array_product [$k]= $arr_count;
    $array_product1 [$k]= $val_cat->celebrity_detail->id;
    $k++;
                    }
                }
                }
     // pr($array_product);pr($array_product1);exit;      
         array_multisort($array_product, SORT_DESC, $array_product1, SORT_ASC);
//pr($array_product1);exit;
           foreach($array_product1 as $val){
                   
                $datas_all_save=$this->Categories->find('all', array(
         'recursive' => -1,
		
              'contain' => array(
                     'CelebrityCategories'=>array('CelebrityDetails'=>array('EventFollows'=>array('conditions'=>array('EventFollows.user_city'=>$city_visitor)),'CelebrityPhotos','conditions'=>array(
		'CelebrityDetails.isdeleted' =>0,
                'CelebrityDetails.status' =>1
               
              
				
                ))
                             )),
                        
                       
	    'conditions'=>array(
		'Categories.is_deleted' =>0,
                'Categories.status' =>1,
                'Categories.parent_id' =>0
              
				
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
                $data_all_produ = $datas_all_save->toArray();
                array_push($array2,$data_all_produ);
                }
             //   $staff_data11_saveal2 = $array2->toArray();
              
		$this->set('array2',json_encode($array2)); 
               
          
     // 
		
               // pr($data_all);exit;
//                foreach($data_all[0]->celebrity_categories as $count_follow){
//                    $arr=array();exit;
//                 //  pr($count_follow->celebrity_detail);exit;
//                    if(!empty($count_follow->celebrity_detail->event_follows)){
//                  array_push( $arr[], count($count_follow->celebrity_detail->event_follows));
//                    
//                     }
//                    }
//                
     //  pr($arr);exit;
                
//                    foreach($val_category->celebrity_categories as $viewlist){
                      
//                        $follow=0;
//                        //$arr[$viewlist->celebrity_detail->id]=array();
//                    
//                        if(!empty($viewlist->celebrity_detail->event_follows)){
//                        foreach($viewlist->celebrity_detail->event_follows as  $valelm ){
//                         
//                            if($valelm->user->city == $city_visitor){
//                                $follow=$follow+1;
//                                
//                             
//                        } 
//                          array_push($arr[$viewlist->celebrity_detail->id] ,$follow);
//                    }
//                   
//                       //   array_push($val_category->celebrity_categories,$follow);
//                 //  pr($arr[$viewlist->celebrity_detail->id]);exit;
//                        }
//                     //    array_push($val_category->celebrity_categories,0);
//                }
//                }
//     
                if(!empty($data_all)){
		$this->set('data_all',$data_all);
              
		} //pr($data_all);exit;
                
                  if($this->request->is("post") or $this->request->is("put")){
               $city=$this->request->data["event_city"];
                      $data_all11=$this->Categories->find('all', array(
         'recursive' => -1,
		
              'contain' => array(
                     'CelebrityCategories'=>array('CelebrityDetails'=>array('EventFollows'=>array('conditions'=>array('EventFollows.user_city'=>$city)),'CelebrityPhotos','conditions'=>array(
		'CelebrityDetails.isdeleted' =>0,
                'CelebrityDetails.status' =>1
                
              
				
                ))
                             )),
                         
                         
                       
	    'conditions'=>array(
		'Categories.is_deleted' =>0,
                'Categories.status' =>1,
                'Categories.parent_id' =>0
              
				
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
         $data_all = $data_all11->toArray();
      //   pr($data_all);exit;
                if(!empty($data_all)){
		$this->set('data_all',$data_all);
              
		}
                    
                }
    }
                
        public function submitRating(){
            
              if($this->request->is("post") or $this->request->is("put")){
                  $date1=date('Y-m-d');
                   $eventTable11 = TableRegistry::get('CelebrityRattings');
                    $ticketevent = $eventTable11->newEntity();
                      
                    $ticketevent->celebrity_detail_id=$this->request->data["cel_id"];
                    $ticketevent->user_id=$this->request->data["user_id"];
                    $ticketevent->name=$this->request->data["name"];
                    $ticketevent->email=$this->request->data["email"];
                    $ticketevent->rating=$this->request->data["star"];
                      $ticketevent->created=$date1;
        $ticketevent->modified=$date1;
                   $this->CelebrityRattings->save($ticketevent);
                     $this->Flash->set('Ratting Added Successfully');
		  $this->redirect(array("controller"=>"celebrities","action"=>"celebrity_detail",$this->request->data["cel_id"])); 
              }
            
        }
    
         public function celRequest(){
           
              if($this->request->is("post") or $this->request->is("put")){
                  $date1=date('Y-m-d');
                   $eventTable11 = TableRegistry::get('CelebrityRequests');
                    $ticketevent = $eventTable11->newEntity();
                       $ticketevent->phno=$this->request->data["phone_no"];
                    $ticketevent->celebrity_link=$this->request->data["celebrity_link"];
                    $ticketevent->user_city= $this->request->session()->read('visitor.city');
                    $ticketevent->user_country= $this->request->session()->read('visitor.country');
                  
                      $ticketevent->created=$date1;
                      $ticketevent->modified=$date1;
                   $this->CelebrityRequests->save($ticketevent);
                     $this->Flash->set('Request Added Successfully');
		  $this->redirect(array("controller"=>"celebrities","action"=>"list-celebrity")); 
              }
            
        }
        
        
         public function searchNew(){
           
            $userdata=$this->Auth->User();	
        $user_id=$userdata['id'];
        
             if($this->request->is("post") or $this->request->is("put")){
                      $city_visitor=    $this->request->session()->read('visitor.city');      
                    $name=$this->request->data["search2"];
                     $datas=$this->CelebrityDetails->find('all', array(
         'recursive' => -1,
	 'contain' => array(
             'CelebrityPhotos','EventFollows'=>array('conditions'=>array('EventFollows.user_city'=>$city_visitor))
	    ),
	    'conditions'=>array(
                'CelebrityDetails.name' =>$name,
                'CelebrityDetails.isdeleted' =>0,
                'CelebrityDetails.status' =>1
            ),
        'order' => array(
            )
        ));
		$staff_data11 = $datas->toArray();
              //  print_r($staff_data11);exit;
		$this->set('staff_data',json_encode($staff_data11));  
                    
                     $this->Flash->set('Request Added Successfully');
		  $this->redirect(array("controller"=>"pages","action"=>"index")); 
             }
              }
        
        
        
    
        public function privateRequest(){
           
            $userdata=$this->Auth->User();	
        $user_id=$userdata['id'];
        
              if($this->request->is("post") or $this->request->is("put")){
                  $date1=date('Y-m-d');
                   $eventTable11 = TableRegistry::get('CelebrityPrivaterequests');
                    $ticketevent = $eventTable11->newEntity();
                      
                    $ticketevent->celebrity_detail_id=$this->request->data["cel_id"];
                    $ticketevent->user_city= $this->request->session()->read('visitor.city');
                    $ticketevent->user_country= $this->request->session()->read('visitor.country');
                    $ticketevent->name= $this->request->data["name"];
                    $ticketevent->email= $this->request->data["email"];
                    $ticketevent->phno= $this->request->data["phno"];
                    $ticketevent->location_city=$this->request->data["city"];
                  $ticketevent->user_id= $user_id;
                  
                      $ticketevent->created=$date1;
                      $ticketevent->modified=$date1;
                   $this->CelebrityPrivaterequests->save($ticketevent);
                     $this->Flash->set('Request Added Successfully');
		  $this->redirect(array("controller"=>"celebrities","action"=>"list-celebrity")); 
              }
            
        }
        
        
    
      public function celebrityDetail($id=NULL){
       
          $this->set('id',$id);
          $city_visitor=    $this->request->session()->read('visitor.city');
          $date1=date('Y-m-d');
        $this->viewBuilder()->setLayout('default');
          $data_all11=$this->CelebrityDetails->get($id, array(
         'recursive' => -1,
		
              'contain' => array(
                  'EventFollows'=>array('conditions'=>array('EventFollows.user_city'=>$city_visitor)),
                    'CelebrityPhotos','CelebrityVideos','CelebrityRattings'
                             ),
                         'conditions'=>array(
		'CelebrityDetails.isdeleted' =>0,
                'CelebrityDetails.status' =>1,
                'CelebrityDetails.id ' => $id
              
				
                ),
                         
         
                'order' => array(
                'CelebrityDetails.id' => 'DESC'
                )
        ));
          
          $data_all11 = $data_all11->toArray();
    //    pr($data_all11);exit;
                if(!empty($data_all11)){
		$this->set('data_all',json_encode($data_all11));
              
		}
                
                
           $data_event=$this->EventCelebrities->find('all', array(
         'recursive' => -1,
		
              'contain' => array(
                    'CelebrityDetails'=>array( 'CelebrityPhotos'),'EventDetails'=>array(
                        'EventPhotos','EventOrders','EventCategories'=>array('Categories'),
                        'EventOrganizers'=>['Users'],
                        
                       'conditions'=>array(
		'EventDetails.isdeleted' =>0,
               
                'EventDetails.status ' => 1
              
				
                ),  
                    )
                             ),
                'conditions'=>array(
		'EventCelebrities.isdeleted' =>0,
               
                'EventCelebrities.celebrity_id ' => $id
              
				
                ),
                         
         
                'order' => array(
                'EventCelebrities.id' => 'DESC'
                )
        ));
           
           
           
        // pr($data_all11);exit;
		$data_event = $data_event->toArray();
     //  pr($data_event);exit;
                if(!empty($data_event)){
		$this->set('data_event',json_encode($data_event));
              
		}
                
                
                
                
      $data_event_cel=$this->EventCelebrities->find('all', array(
         'recursive' => -1,
		
                'conditions'=>array(
		'EventCelebrities.isdeleted' =>0,
               
                'EventCelebrities.celebrity_id ' => $id
              
				
                ),'order' => array(
                'EventCelebrities.id' => 'DESC'
                )
        ));
           
           
           
        // pr($data_all11);exit;
		$data_event_cel = $data_event_cel->toArray();
      // pr($data_event);exit;
               $celebrity_count= count($data_event_cel);
                if(!empty($celebrity_count)){
		$this->set('celebrity_count',($celebrity_count));
              
		}          
                
                
                
    }
    
    
    
      }      
	 

?>