<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Event\Event;

class ApiesController extends AppController {

 	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	 
	   
			 $this->Auth->allow(['listCelebrity','logout','listCategory','listEventCity','listEventAll','SingleCelebrity','SingleEvent','privateRequest','celebrityDetail','follow','submitRating']);

	    
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
                  $this->loadModel('EventDetails');
                     $this->loadModel('EventCategories');
                       $this->loadModel('NewsCelebrities');
                        $this->loadModel('NewsDetails');
                        $this->loadModel('CelebrityRequests');
                         $this->loadModel('CelebrityPrivaterequests');
                    
        $this->loadComponent('RequestHandler');
    } 
	public function display() {

		$path = func_get_args();



		
	}

 public function listCelebrity(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
 
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

$city_visitor= 'Kolkata';

         $datas_all=$this->CelebrityDetails->find('all', array(
         'recursive' => -1,
             
             'fields'=>array('id','name','current_location'),
	 'contain' => array(
            'CelebrityPhotos'=>array('fields'=>array('id','image','celebrity_detail_id')),
	    
	    ),
	    'conditions'=>array(
               'CelebrityDetails.isdeleted' =>0,
                'CelebrityDetails.status' =>1,
                 'CelebrityDetails.current_location' =>$city_visitor
            ),
        'order' => array(
            )
       ));
        if(empty($datas_all))     {
            
            $datas_all=$this->CelebrityDetails->find('all', array(
         'recursive' => -1,
             'fields'=>array('id','name','current_location'),
                'limit' => 10,
	 'contain' => array(
            'CelebrityPhotos'=>array('fields'=>array('id','image','celebrity_detail_id')),
	    
	    ),
	    'conditions'=>array(
               'CelebrityDetails.isdeleted' =>0,
                'CelebrityDetails.status' =>1
                
            ),
        'order' => array(
            )
       ));
        }  
        
            $staff_data11_all_new = $datas_all->toArray();
         //  pr($staff_data11_all_new);exit;
               echo json_encode($staff_data11_all_new); exit;
                
 }

  public function listCategory(){
      
      $data_all=$this->Categories->find('all', array(
         'recursive' => -1,
          'fields'=>array('id','category_name'),
	    'conditions'=>array(
				'Categories.is_deleted' =>0,
                'Categories.parent_id' =>0,
                 'Categories.status' =>1,
                  'Categories.is_deleted' =>0
              
				
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
		$data_all = $data_all->toArray();
            
                if(!empty($data_all)){
		echo json_encode($data_all);exit;
              
		}
      
  }
  public function listEventCity(){
                $date1=date('Y-m-d');
         if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
 
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

$city_visitor= 'Kolkata';

            $data_all_event=$this->EventDetails->find('all', array(
         'recursive' => -1,
                'fields'=>array('id','event_title','event_description','approx_start_date','target_amount','event_amount'),
                
	'contain' => array('EventOrders'=>array('fields'=>array('id','event_id','product_price')),
           'EventCategories'=>array('Categories'=>array('fields'=>array('id','category_name'))),'EventCelebrities'=>array('CelebrityDetails'=>array('CelebrityPhotos','fields'=>array('id','name')))
	    ),
	    'conditions'=>array(
                'EventDetails.isdeleted' =>0,
                 'EventDetails.event_city' =>$city_visitor,
                  'EventDetails.approx_start_date >' => $date1
               
            ),
        'order' => array(
             'EventDetails.id' => 'DESC'
            )
        ));    
            if(empty($data_all_event)){
                 $data_all_event=$this->EventDetails->find('all', array(
         'recursive' => -1,
                'fields'=>array('id','event_title','event_description'),
	'contain' => array(
           'EventCategories'=>array('Categories'=>array('fields'=>array('id','category_name'))),'EventCelebrities'=>array('CelebrityDetails'=>array('CelebrityPhotos','fields'=>array('id','name')))
	    ),
	    'conditions'=>array(
                'EventDetails.isdeleted' =>0
            
               
            ),
        'order' => array(
             'EventDetails.id' => 'DESC'
            )
        ));    
            }
                
                
           
		$data_all_event = $data_all_event->toArray();
            echo json_encode($data_all_event);exit;
//                if(!empty($data_all_event)){
//		$this->set('data_all_event',json_encode($data_all_event));
//              
//		}    
                
  }
  
 public function listEventAll(){
             
      
 $date1=date('Y-m-d');
            $data_all_event=$this->EventDetails->find('all', array(
         'recursive' => -1,
                  'limit' => 10,
                'fields'=>array('id','event_title','event_description','approx_start_date','target_amount'),
	'contain' => array('EventOrders'=>array('fields'=>array('id','event_id','product_price')),
           'EventCategories'=>array('Categories'=>array('fields'=>array('id','category_name'))),'EventCelebrities'=>array('CelebrityDetails'=>array('CelebrityPhotos','fields'=>array('id','name')))
	    ),
	    'conditions'=>array(
                'EventDetails.isdeleted' =>0,
                'EventDetails.approx_start_date >' => $date1
               
            ),
              
        'order' => array(
             'EventDetails.id' => 'DESC'
            )
        ));    
            
                
                
           
		$data_all_event = $data_all_event->toArray();
           // pr($data_all_event);exit;
                if(!empty($data_all_event)){
                        echo json_encode($data_all_event); exit;
		//$this->set('data_all_event',json_encode($data_all_event));
              
		}    
                
  }
  public function SingleCelebrity($id=NULL){
      
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
 
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

$city_visitor= 'Kolkata';
        $this->set('id',$id);
        //  $city_visitor=    $this->request->session()->read('visitor.city');
          $date1=date('Y-m-d');
        $this->viewBuilder()->setLayout('default');
          $data_all11=$this->CelebrityDetails->get($id, array(
         'recursive' => -1,
		'fields'=>array('name','description','current_location'),
              'contain' => array(
                  'EventFollows'=>array('conditions'=>array('EventFollows.user_city'=>$city_visitor)),
                    'CelebrityPhotos'=>array('fields'=>array('id','image')),'CelebrityRattings'
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
     
                if(!empty($data_all11)){
		echo json_encode($data_all11);exit;
              
      
  }
  }
  
   public function SingleEvent($id=NULL){
       $date1=date('Y-m-d');
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
 
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

$city_visitor= 'Kolkata';
        $this->set('id',$id);
        //  $city_visitor=    $this->request->session()->read('visitor.city');
          $date1=date('Y-m-d');
        $this->viewBuilder()->setLayout('default');
          $data_all11=$this->EventDetails->get($id, array(
         'recursive' => -1,
		'fields'=>array('id','event_title','event_description','event_location','approx_start_date','target_amount'),
              'contain' => array(
           'EventCategories'=>array('Categories'=>array('fields'=>array('id','category_name'))),'EventCelebrities'=>array('CelebrityDetails'=>array('fields'=>array('id','name')))
	    ),
               'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.status' =>1,
                'EventDetails.approx_start_date >' => $date1
				
                ),
                         
                 'order' => array(
                'EventDetails.id' => 'DESC'
                )
        ));
          
          $data_all11 = $data_all11->toArray();
     pr($data_all11);exit;
                if(!empty($data_all11)){
		$this->set('data_all',json_encode($data_all11));
              
      
  }
  }
   public function registration(){
       $data = json_decode(file_get_contents('php://input'), true);
      
$fname=$data['fname'];
$lname=$data['lname'];
   $phoneno=$data['phone_no'];      
   $password=$data['password']; 
     $cpassword=$data['cpassword']; 
   if($cpassword==$password){
       
                        $usersTable = TableRegistry::get('Users');
                        $user = $usersTable->newEntity();

			$user->fname=$fname;
			$user->lname=$lname;
                        
                      $user->username=$phoneno;
                        
                        $user->phone_number=$phoneno;
                      
                        $user->password=$password;
                        $user->pswd_token=$password;
                        
                       
			$user->user_type=1;
			$user->modified=date("Y-m-d");  
                        $this->Users->save($user);
       
   }
       
   }
  
   public function login(){
       $data = json_decode(file_get_contents('php://input'), true);

       
   $phoneno=$data['phone_no'];      
   $password=$data['password']; 
    $user = $this->Auth->identify();
            if ($user) {
               // pr($user);exit;
                $this->Auth->setUser($user);
      pr($user);exit;
       
                      
       
   }}
       
   
}

