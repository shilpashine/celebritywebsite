<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class UsersController extends AppController {
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
		$user = $this->Auth->User();
	    if(!empty($user)){
		  if($user['user_type']!=0){
			return $this->redirect($this->Auth->logout());
	        }
		  else{
		   $this->Auth->allow(['login','logout','editProfile','listUser','viewData','addData','editData','listStaff','addStaffData','viewStaffData','ajaxStaffEditData','editStaffData','listCustomer','listDesigner','listSupplier','listFranchise','addCustomerData','viewCustomerData','ajaxCustomerEditData','editCustomerData','addDesignerData','viewDesignerData','ajaxDesignerEditData','editDesignerData','addSupplierData','viewSupplierData','ajaxSupplierEditData','editSupplierData','addFranchiseData','viewFranchiseData','ajaxFranchiseEditData','editFranchiseData']);
		    }
	    }
		else{
		  $this->Auth->allow(['login','logout','editProfile','listUser','viewData','addData','editData','listStaff','addStaffData','viewStaffData','ajaxStaffEditData','editStaffData','listCustomer','listDesigner','listSupplier','listFranchise','addCustomerData','viewCustomerData','ajaxCustomerEditData','editCustomerData','addDesignerData','viewDesignerData','ajaxDesignerEditData','editDesignerData','addSupplierData','viewSupplierData','ajaxSupplierEditData','editSupplierData','addFranchiseData','viewFranchiseData','ajaxFranchiseEditData','editFranchiseData']);
		}
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Users');
                $this->loadModel('CelebrityDetails');
                
                   $this->loadModel('OrganizerCelebrities');
                
                
        $this->loadComponent('RequestHandler');
    } 
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if($user['user_type']==0 && $user['active']==1 && $user['is_deleted']==0){
            if ($user) {
                $this->Auth->setUser($user);
				$this->Flash->error(__('Successfully Login'));
				$this->redirect(array("controller"=>"dashboards","action"=>"index"));
            }
			}
			else{
				 $this->Flash->error(__('Invalid username or password, try again'));
				return $this->redirect($this->Auth->logout());
			}
        }
    }
    public function logout() {
		$this->Flash->error(__('Log Out Successfully'));
        return $this->redirect($this->Auth->logout());
    }
	/*public function editProfile() {
	    $this->viewBuilder()->setLayout('dashboard');
	    $userdata=$this->Auth->User();
        $datas=$this->Users->get($userdata['id'], array(
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
		$user_data = $datas->toArray();
		$this->set('user_data',json_encode($user_data));
		if($this->request->is("post") or $this->request->is("put")){
			$edit_user =$this->Users->get($userdata['id']); 
			$edit_user->pswd_token=$this->request->data["pswd_token"];
			$edit_user->password=$this->request->data["pswd_token"];
			$edit_user->modified=date("Y-m-d");
			if($this->Users->save($edit_user))
				{
				    $this->Flash->set('The data has been successfully updated.');
					$this->redirect(array("controller"=>"dashboards","action"=>"index"));	
				}
				
				else
				{
					$this->Flash->set(__("Data Could Not Be Updated"));
					$this->redirect(array("controller"=>"dashboards","action"=>"index"));
				}
		}
    }*/
	public function editProfile() {
	    $this->viewBuilder()->setLayout('default_datatable');
	    $userdata=$this->Auth->User();
        $datas=$this->Users->get($userdata['id'], array(
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
		$user_data = $datas->toArray();
		$this->set('user_data',json_encode($user_data));
		if($this->request->is("post") or $this->request->is("put")){
			pr($this->request->data);
			$user =$this->Users->get($userdata['id']);
			$user->fname=$this->request->data["fname"];
			$user->lname=$this->request->data["lname"];
			$user->phone_number=$this->request->data["phone_number"];
			$user->address=$this->request->data["address"];
			$user->username=$this->request->data["username"];			
			$user->pswd_token=$this->request->data["pswd_token"];
			$user->password=$this->request->data["pswd_token"];
                        $user->dob=$this->request->data["dob"];
			$user->modified=date("Y-m-d");
			if(!empty($this->request->data["image"])){
				if($this->request->data["image"]["name"])
				{
					$image=$this->imageUpload($this->request->data,"image");
					//echo $image; exit;
					if($image)
					{
							$user->image=$image;
							unlink("img/original/$image");
							unlink("img/large/$image");
							unlink("img/small/$image");
					}
					else
					{
					}
			    }
		    }  
			else
			{
				unset($user->image);
			}
			if($this->Users->save($user))
				{
				    $this->Flash->set('The data has been successfully updated.');
					$this->redirect(array("controller"=>"dashboards","action"=>"index"));	
				}
				
				else
				{
					$this->Flash->set(__("Data Could Not Be Updated"));
					$this->redirect(array("controller"=>"dashboards","action"=>"index"));
				}
		}
    }
     public function listEventmanager(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
         
         $user_datas=$this->Users->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Users.is_deleted' =>0,
				'Users.user_type' =>4
                ),
                'order' => array(
                'Users.id' => 'DESC'
                )
        ));
		$user_datas = $user_datas->toArray();
                
		//pr($user_datas);exit;
		if(!empty($user_datas)){
		$this->set('celebrity_datas',json_encode($user_datas));
		}
		}
		else
		{
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
                
                
                        
         $cel_datas=$this->CelebrityDetails->find('all', array(
         'recursive' => -1,
		 'contain' => array(
                     
	    ),
	    'conditions'=>array(
				'CelebrityDetails.isdeleted' =>0,
				'CelebrityDetails.status' =>1
                ),
                'order' => array(
                'CelebrityDetails.id' => 'DESC'
                )
        ));
		$cel_datas = $cel_datas->toArray();
                
		//pr($user_datas);exit;
		if(!empty($cel_datas)){
		$this->set('cel_datas',json_encode($cel_datas));
		}
                
                
                
          if($this->request->is("post") or $this->request->is("put")){
		$usersTable = TableRegistry::get('Users');
                $user = $usersTable->newEntity();

			$user->fname=$this->request->data["fname"];
			$user->lname=$this->request->data["lname"];
			$user->email=$this->request->data["email"];
                        $user->username=$this->request->data["username"];
                        $user->password=$this->request->data["password"];
                         $user->pswd_token=$this->request->data["password"];
                        $user->phone_number=$this->request->data["phone_no"];
                        $user->dob=$this->request->data["dob"];
			$user->gender=$this->request->data["gendar"];
			$user->description=$this->request->data["description"];			
			$user->address=$this->request->data["address"];
			$user->user_type=4;
			$user->modified=date("Y-m-d");
			
                        if(!empty($this->request->data["image"])){
				if($this->request->data["image"]["name"])
				{
					$image=$this->imageUpload($this->request->data,"image");
					//echo $image; exit;
					if($image)
					{
							$user->image=$image;
							unlink("img/original/$image");
							unlink("img/large/$image");
							unlink("img/small/$image");
					}
					else
					{
					}
			    }
		    }  
			else
			{
				unset($user->image);
			}
                        
                        
			
                            
                          $user1= $this->Users->save($user);
                       
                       
                        $insertedId = $user1->id;
                            
                             if(!empty($this->request->data["event_celebrity"])){
                          for($o=0;$o<count($this->request->data["event_celebrity"]);$o++){
                        //    pr($this->request->data["url"][$i]);exit;
                $usersTable22 = TableRegistry::get('OrganizerCelebrities');
                $videos11 = $usersTable22->newEntity();
                       $videos11->user_id=$insertedId;
                        $videos11->celebrity_detail_id=$this->request->data["event_celebrity"][$o];
                        $videos11->created=date("Y-m-d");
                        $videos11->modified=date("Y-m-d");
                       $this->OrganizerCelebrities->save($videos11);
                        
                        }
                        
                          }
                            
                            
                            
                            
                            
                            
                            
                            
				    $this->Flash->set('The data has been successfully updated.');
					$this->redirect(array("controller"=>"users","action"=>"list_eventmanager"));	
				
				
				
		}
      }  
      
      
      
      
      
      
     public function allUserlist(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
         
         $user_datas=$this->Users->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Users.is_deleted' =>0,
				'NOT'=>array('Users.user_type ' =>0)
                ),
                'order' => array(
                'Users.id' => 'DESC'
                )
        ));
		$user_datas = $user_datas->toArray();
                
		//pr($user_datas);exit;
		if(!empty($user_datas)){
		$this->set('celebrity_datas',json_encode($user_datas));
		}
		}
		else
		{
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}  
      
     } 
      
     
     
     public function ajaxStatusChange(){
	    $curr_status=$this->request->data['curr_status'];
		 //echo $id;exit;
		 $datas=$this->Users->find('all', array(
         'recursive' => -1,
		
	    'conditions'=>array(
                'Users.is_deleted' =>0,
                 'Users.status' =>$curr_status
            )
        
        ));
		$celebrity_datas = $datas->toArray();
                //print_r($staff_data);exit;
		$this->set('celebrity_datas',json_encode($celebrity_datas));
    }
     
     
      public function ajaxOrgnizerEditData(){
	    $id=$this->request->data['id'];
		 //echo $id;exit;
		 $datas=$this->Users->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$staff_data = $datas->toArray();
                //print_r($staff_data);exit;
		$this->set('staff_data',json_encode($staff_data));
    }
     
       public function changeStatus($id=NUlL){
         $this->autoRender = false ;

        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
       
            $user_datas = $this->Users->find('all', [
                'fields'=>array('id','status'),
    'conditions' => ['Users.is_deleted' =>0,'Users.id' =>$id]
])->first();
            
            
            
        
      
         $usersTable = TableRegistry::get('Users');
         $article = $usersTable->get($id);
         
if($user_datas->status==1){
    $article->status = '0';
}else{
    $article->status = '1';
}
 // Return article with id 12

$usersTable->save($article);
           $this->Flash->set('The data has been successfully updated.');
 $this->redirect(array("controller"=>"users","action"=>"list_eventmanager"));	        

        }
        
        
    }
    
    
      public function changeStatusAll($id=NUlL){
         $this->autoRender = false ;

        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
       
            $user_datas = $this->Users->find('all', [
                'fields'=>array('id','status'),
    'conditions' => ['Users.is_deleted' =>0,'Users.id' =>$id]
])->first();
            
            
            
        
      
         $usersTable = TableRegistry::get('Users');
         $article = $usersTable->get($id);
         
if($user_datas->status==1){
    $article->status = '0';
}else{
    $article->status = '1';
}
 // Return article with id 12

$usersTable->save($article);
           $this->Flash->set('The data has been successfully updated.');
 $this->redirect(array("controller"=>"users","action"=>"all_userlist"));	        

        }
        
        
    }
    
    
     public function deleteData($id=null){
	    $id=$id;
	    $user=$this->Users->get($id); 
		$user->is_deleted=1;
		if($this->Users->save($user))
			{
				$this->Flash->set('The user has been successfully deleted.');
				$this->redirect(array("controller"=>"users","action"=>"list_eventmanager"));
			}
		else
			{
				$this->Session->setFlash(__("User Could Not Be Deleted!Try Again."));
				$this->redirect(array("controller"=>"users","action"=>"list_eventmanager"));
			}
    }
    public function viewData(){
	     $id=$this->request->data['id'];
		 $datas=$this->Users->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
                //'Users.id' => 'DESC'
            )
        ));
		$user_data = $datas->toArray();
		$this->set('user_data',json_encode($user_data));
    }
	 public function addData(){
		$this->viewBuilder()->setLayout('user');
		if($this->request->is("post") or $this->request->is("put")){
			 //pr($this->request->data);exit;
        $user = $this->Users->newEntity(); 			
        $user->username=$this->request->data['username'];
		$user->user_type="OperatorAdmin";
		$user->pswd_token=$this->request->data['pswd_token'];
		$user->password=$this->request->data['pswd_token'];
		$user->created=date("Y-m-d");
		$user->modified=date("Y-m-d");
		if($this->request->data["image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"image");
		  		if($image)
				{
					   $user->image=$image;
				}
				else
				{
				}
			}
			else
			{
			//unset($category->image);
			}
         if ($this->Users->save($user)) {
         // The $article entity contains the id now
         //$id = $article->id;
		  $this->Flash->set('The data has been successfully added.');
		  $this->redirect(array("controller"=>"users","action"=>"list_staff"));
         }
		 else{
		  $this->Flash->set('The data could not be added.Try again');
		  $this->redirect(array("controller"=>"users","action"=>"list_staff")); 
		 }
		 }
    }
	public function editData(){
		$this->viewBuilder()->setLayout('user');
		if($this->request->is("post") or $this->request->is("put")){
        $id=$this->request->data["edit_user_id"];
		$user=$this->Users->get($id);
		$user->username=$this->request->data['edit_username'];
		$user->pswd_token=$this->request->data['edit_pswd_token'];
		$user->password=$this->request->data['edit_pswd_token'];
		$user->modified=date("Y-m-d");
		 if($this->request->data["edit_image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"edit_image");
				//echo $image; exit;
		  		if($image)
				{
					    $user->image=$image;
						unlink("img/original/$image");
						unlink("img/large/$image");
						unlink("img/small/$image");
				}
				else
				{
				}
			}
			else
			{
				unset($user->image);
			}
			 if ($this->Users->save($user)) {
			  $this->Flash->set('The data has been successfully updated.');
			  $this->redirect(array("controller"=>"users","action"=>"list_staff"));
			 }
			 else{
			  $this->Flash->set('The data could not be updated.Try again');
			  $this->redirect(array("controller"=>"users","action"=>"list_staff")); 
			 }
		}
    }
    public function listStaff(){	
      $this->viewBuilder()->setLayout('user');
      $datas=$this->Users->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Users.is_deleted' =>0,
				'Users.user_type' =>5
                ),
                'order' => array(
                'Users.id' => 'DESC'
                )
				//'limit' => 15
        ));
		$staff_data = $datas->toArray();
		$this->set('staff_data',json_encode($staff_data));
    }
	public function addStaffData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
		 //pr($this->request->data);exit;
         $user = $this->Users->newEntity(); 
         $user->fname=$this->request->data['fname'];
         $user->lname=$this->request->data['lname'];		 
         $user->username=$this->request->data['username'];
		 $user->phone_number=$this->request->data['phone_number'];
         $user->address=$this->request->data['address'];	
		 $user->user_type=5;
		 $user->pswd_token=$this->request->data['pswd_token'];
		 $user->password=$this->request->data['pswd_token'];
		 $user->created=date("Y-m-d");
		 $user->modified=date("Y-m-d");
		 if($this->request->data["image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"image");
		  		if($image)
				{
					   $user->image=$image;
				}
				else
				{
				}
			}
			else
			{
			//unset($category->image);
			}
			 if ($this->Users->save($user)) {
			 // The $article entity contains the id now
			 //$id = $article->id;
			  $this->Flash->set('The data has been successfully added.');
			  $this->redirect(array("controller"=>"users","action"=>"list_staff"));
			 }
			 else{
			  $this->Flash->set('The data could not be added.Try again');
			  $this->redirect(array("controller"=>"users","action"=>"list_staff")); 
			 }
		}
    }
    public function viewStaffData(){
	    $id=$this->request->data['id'];
		$datas=$this->Users->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
                //'Users.id' => 'DESC'
            )
        ));
		$staff_data = $datas->toArray();
		$this->set('staff_data',json_encode($staff_data));
    }
    public function ajaxStaffEditData(){
	    $id=$this->request->data['id'];
		 //echo $id;exit;
		 $datas=$this->Users->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$staff_data = $datas->toArray();
		$this->set('staff_data',json_encode($staff_data));
    }
	public function editStaffData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
         $id=$this->request->data["edit_user_id"];
		 $user=$this->Users->get($id);
		 $user->fname=$this->request->data['edit_fname'];
		 $user->lname=$this->request->data['edit_lname'];
		 $user->username=$this->request->data['edit_username'];
		 $user->phone_number=$this->request->data['edit_phone_number'];
		 $user->address=$this->request->data['edit_address'];
		 $user->pswd_token=$this->request->data['edit_pswd_token'];
		 $user->password=$this->request->data['edit_pswd_token'];
		 $user->modified=date("Y-m-d");
		 if($this->request->data["edit_image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"edit_image");
				//echo $image; exit;
		  		if($image)
				{
					    $user->image=$image;
						unlink("img/original/$image");
						unlink("img/large/$image");
						unlink("img/small/$image");
				}
				else
				{
				}
			}
			else
			{
				unset($user->image);
			}
			 if ($this->Users->save($user)) {
			  $this->Flash->set('The data has been successfully updated.');
			  $this->redirect(array("controller"=>"users","action"=>"list_staff"));
			 }
			 else{
			  $this->Flash->set('The data could not be updated.Try again');
			  $this->redirect(array("controller"=>"users","action"=>"list_staff")); 
			 }
		}
    }
	public function listCustomer(){	
    $this->viewBuilder()->setLayout('user');
      $datas=$this->Users->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Users.is_deleted' =>0,
				'Users.user_type' =>1
                ),
                'order' => array(
                'Users.id' => 'DESC'
                ),
				'limit' => 15
        ));
		$customer_data = $datas->toArray();
		$this->set('customer_data',json_encode($customer_data));
    }
    public function addCustomerData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
		 //pr($this->request->data);exit;
         $user = $this->Users->newEntity(); 
         $user->fname=$this->request->data['fname'];
         $user->lname=$this->request->data['lname'];		 
         $user->username=$this->request->data['username'];
		 $user->phone_number=$this->request->data['phone_number'];
         $user->address=$this->request->data['address'];	
		 $user->user_type=1;
		 $user->pswd_token=$this->request->data['pswd_token'];
		 $user->password=$this->request->data['pswd_token'];
		 $user->created=date("Y-m-d");
		 $user->modified=date("Y-m-d");
		 if($this->request->data["image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"image");
		  		if($image)
				{
					   $user->image=$image;
				}
				else
				{
				}
			}
			else
			{
			//unset($category->image);
			}
			 if ($this->Users->save($user)) {
			 // The $article entity contains the id now
			 //$id = $article->id;
			  $this->Flash->set('The data has been successfully added.');
			  $this->redirect(array("controller"=>"users","action"=>"list_customer"));
			 }
			 else{
			  $this->Flash->set('The data could not be added.Try again');
			  $this->redirect(array("controller"=>"users","action"=>"list_customer")); 
			 }
		}
    }
	public function viewCustomerData(){
	    $id=$this->request->data['id'];
		$datas=$this->Users->get($id, array(
        'recursive' => -1,
		'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
                //'Users.id' => 'DESC'
            )
        ));
		$customer_data = $datas->toArray();
		$this->set('customer_data',json_encode($customer_data));
    }
	public function ajaxCustomerEditData(){
	     
            
           
	    $id=$this->request->data['id'];
		 //echo $id;exit;
		 $datas=$this->Users->get($id, array(
         'recursive' => -1,
		 'contain' => array(
                     'OrganizerCelebrities'
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$staff_data = $datas->toArray();
               
		$this->set('staff_data',json_encode($staff_data));
 
            
             $cel_datas=$this->CelebrityDetails->find('all', array(
         'recursive' => -1,
		 'contain' => array(
                     
	    ),
	    'conditions'=>array(
				'CelebrityDetails.isdeleted' =>0,
				'CelebrityDetails.status' =>1
                ),
                'order' => array(
                'CelebrityDetails.id' => 'DESC'
                )
        ));
		$cel_datas = $cel_datas->toArray();
                
		//pr($user_datas);exit;
		if(!empty($cel_datas)){
		$this->set('cel_datas',json_encode($cel_datas));
		}
                
            
            
    }
    
    public function updateData11 (){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
             
         
          if($this->request->is("post") or $this->request->is("put")){
		$usersTable = TableRegistry::get('Users');
                $user = $usersTable->get($this->request->data["edit_user_id"]);
         
                
			$user->fname=$this->request->data["fname"];
			$user->lname=$this->request->data["lname"];
			$user->email=$this->request->data["email"];
                        $user->password=$this->request->data["password"];
                        $user->pswd_token=$this->request->data["password"];
                        $user->phone_number=$this->request->data["phone_no"];
                        $user->dob=$this->request->data["dob11"];
                        $user->username=$this->request->data["username"];
                        
			$user->gender=$this->request->data["gendar"];
			$user->description=$this->request->data["description"];			
			$user->address=$this->request->data["address"];
			$user->user_type=4;
			$user->modified=date("Y-m-d");
			
                        if(!empty($this->request->data["image"])){
				if($this->request->data["image"]["name"])
				{
					$image=$this->imageUpload($this->request->data,"image");
					//echo $image; exit;
					if($image)
					{
							$user->image=$image;
							unlink("img/original/$image");
							unlink("img/large/$image");
							unlink("img/small/$image");
					}
					else
					{
					}
			    }
		    }  
			else
			{
				unset($user->image);
			}
                        
                        
			if($this->Users->save($user))
				{
                            
                            $datas12=$this->OrganizerCelebrities->find('all', array(
         'recursive' => -1,
	 
	    'conditions'=>array(
                'OrganizerCelebrities.user_id' =>$this->request->data["edit_user_id"]
            )
        
        ));
         $datas11 = $datas12->toArray();
                        foreach($datas11 as $val)    {
                            $users_table = TableRegistry::get('OrganizerCelebrities');
                            $users = $users_table->get($val->id);
                            $users_table->delete($users);
                            
                        }  
                            
                              if(!empty($this->request->data["event_celebrity"])){
                          for($i=0;$i<count($this->request->data["event_celebrity"]);$i++){
                        //    pr($this->request->data["url"][$i]);exit;
                $usersTable = TableRegistry::get('OrganizerCelebrities');
                $videos = $usersTable->newEntity();
                       $videos->user_id=$this->request->data["edit_user_id"];
                        $videos->celebrity_detail_id=$this->request->data["event_celebrity"][$i];
                        $videos->created=date("Y-m-d");
                        $videos->modified=date("Y-m-d");
                       $this->OrganizerCelebrities->save($videos);
                        
                        }
                        } 
                            
                            
				    $this->Flash->set('The data has been successfully updated.');
					$this->redirect(array("controller"=>"users","action"=>"list_eventmanager"));	
				}
				
				else
				{
					$this->Flash->set(__("Data Could Not Be Updated"));
					$this->redirect(array("controller"=>"dashboards","action"=>"index"));
				}
		}
      }      
                
    }     
    
    
	public function editCustomerData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
         $id=$this->request->data["edit_user_id"];
		 $user=$this->Users->get($id);
		 $user->fname=$this->request->data['edit_fname'];
		 $user->lname=$this->request->data['edit_lname'];
		 $user->username=$this->request->data['edit_username'];
		 $user->phone_number=$this->request->data['edit_phone_number'];
		 $user->address=$this->request->data['edit_address'];
		 $user->pswd_token=$this->request->data['edit_pswd_token'];
		 $user->password=$this->request->data['edit_pswd_token'];
		 $user->modified=date("Y-m-d");
		 if($this->request->data["edit_image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"edit_image");
				//echo $image; exit;
		  		if($image)
				{
					    $user->image=$image;
						unlink("img/original/$image");
						unlink("img/large/$image");
						unlink("img/small/$image");
				}
				else
				{
				}
			}
			else
			{
				unset($user->image);
			}
			 if ($this->Users->save($user)) {
			  $this->Flash->set('The data has been successfully updated.');
			  $this->redirect(array("controller"=>"users","action"=>"list_customer"));
			 }
			 else{
			  $this->Flash->set('The data could not be updated.Try again');
			  $this->redirect(array("controller"=>"users","action"=>"list_customer")); 
			 }
		}
    }
    public function listDesigner(){	
    $this->viewBuilder()->setLayout('user');
      $datas=$this->Users->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Users.is_deleted' =>0,
				'Users.user_type' =>2
                ),
                'order' => array(
                'Users.id' => 'DESC'
                ),
				'limit' => 15
        ));
		$designer_data = $datas->toArray();
		$this->set('designer_data',json_encode($designer_data));
    }
    public function addDesignerData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
		 //pr($this->request->data);exit;
         $user = $this->Users->newEntity(); 
         $user->fname=$this->request->data['fname'];
         $user->lname=$this->request->data['lname'];		 
         $user->username=$this->request->data['username'];
		 $user->phone_number=$this->request->data['phone_number'];
         $user->address=$this->request->data['address'];	
		 $user->user_type=2;
		 $user->pswd_token=$this->request->data['pswd_token'];
		 $user->password=$this->request->data['pswd_token'];
		 $user->created=date("Y-m-d");
		 $user->modified=date("Y-m-d");
		 if($this->request->data["image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"image");
		  		if($image)
				{
					   $user->image=$image;
				}
				else
				{
				}
			}
			else
			{
			//unset($category->image);
			}
			 if ($this->Users->save($user)) {
			 // The $article entity contains the id now
			 //$id = $article->id;
			  $this->Flash->set('The data has been successfully added.');
			  $this->redirect(array("controller"=>"users","action"=>"list_designer"));
			 }
			 else{
			  $this->Flash->set('The data could not be added.Try again');
			  $this->redirect(array("controller"=>"users","action"=>"list_designer")); 
			 }
		}
    }
	public function viewDesignerData(){
	    $id=$this->request->data['id'];
		$datas=$this->Users->get($id, array(
        'recursive' => -1,
		'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
                //'Users.id' => 'DESC'
            )
        ));
		$designer_data = $datas->toArray();
		$this->set('designer_data',json_encode($designer_data));
    }
	public function ajaxDesignerEditData(){
	     $id=$this->request->data['id'];
		 //echo $id;exit;
		 $datas=$this->Users->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$designer_data = $datas->toArray();
		$this->set('designer_data',json_encode($designer_data));
    }
	public function editDesignerData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
		 //pr($this->request->data);exit;	 
         $id=$this->request->data["edit_user_id"];
		 $user=$this->Users->get($id);
		 $user->fname=$this->request->data['edit_fname'];
		 $user->lname=$this->request->data['edit_lname'];
		 $user->username=$this->request->data['edit_username'];
		 $user->phone_number=$this->request->data['edit_phone_number'];
		 $user->address=$this->request->data['edit_address'];
		 $user->pswd_token=$this->request->data['edit_pswd_token'];
		 $user->password=$this->request->data['edit_pswd_token'];
		 $user->modified=date("Y-m-d");
		 if($this->request->data["edit_image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"edit_image");
				//echo $image; exit;
		  		if($image)
				{
					    $user->image=$image;
						unlink("img/original/$image");
						unlink("img/large/$image");
						unlink("img/small/$image");
				}
				else
				{
				}
			}
			else
			{
				unset($user->image);
			}
			 if ($this->Users->save($user)) {
			  $this->Flash->set('The data has been successfully updated.');
			  $this->redirect(array("controller"=>"users","action"=>"list_designer"));
			 }
			 else{
			  $this->Flash->set('The data could not be updated.Try again');
			  $this->redirect(array("controller"=>"users","action"=>"list_designer")); 
			 }
		}
    }	
    public function listSupplier(){	
    $this->viewBuilder()->setLayout('user');
      $datas=$this->Users->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Users.is_deleted' =>0,
				'Users.user_type' =>3
                ),
                'order' => array(
                'Users.id' => 'DESC'
                ),
				'limit' => 15
        ));
		$supplier_data = $datas->toArray();
		$this->set('supplier_data',json_encode($supplier_data));
    }
    public function addSupplierData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
		 //pr($this->request->data);exit;
         $user = $this->Users->newEntity(); 
         $user->fname=$this->request->data['fname'];
         $user->lname=$this->request->data['lname'];		 
         $user->username=$this->request->data['username'];
		 $user->phone_number=$this->request->data['phone_number'];
         $user->address=$this->request->data['address'];	
		 $user->user_type=3;
		 $user->pswd_token=$this->request->data['pswd_token'];
		 $user->password=$this->request->data['pswd_token'];
		 $user->created=date("Y-m-d");
		 $user->modified=date("Y-m-d");
		 if($this->request->data["image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"image");
		  		if($image)
				{
					   $user->image=$image;
				}
				else
				{
				}
			}
			else
			{
			//unset($category->image);
			}
			 if ($this->Users->save($user)) {
			 // The $article entity contains the id now
			 //$id = $article->id;
			  $this->Flash->set('The data has been successfully added.');
			  $this->redirect(array("controller"=>"users","action"=>"list_supplier"));
			 }
			 else{
			  $this->Flash->set('The data could not be added.Try again');
			  $this->redirect(array("controller"=>"users","action"=>"list_supplier")); 
			 }
		}
    }
	public function viewSupplierData(){
	    $id=$this->request->data['id'];
		$datas=$this->Users->get($id, array(
        'recursive' => -1,
		'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
                //'Users.id' => 'DESC'
            )
        ));
		$supplier_data = $datas->toArray();
		$this->set('supplier_data',json_encode($supplier_data));
    }
	public function ajaxSupplierEditData(){
	     $id=$this->request->data['id'];
		 //echo $id;exit;
		 $datas=$this->Users->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$supplier_data = $datas->toArray();
		$this->set('supplier_data',json_encode($supplier_data));
    }
	public function editSupplierData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
         $id=$this->request->data["edit_user_id"];
		 $user=$this->Users->get($id);
		 $user->fname=$this->request->data['edit_fname'];
		 $user->lname=$this->request->data['edit_lname'];
		 $user->username=$this->request->data['edit_username'];
		 $user->phone_number=$this->request->data['edit_phone_number'];
		 $user->address=$this->request->data['edit_address'];
		 $user->pswd_token=$this->request->data['edit_pswd_token'];
		 $user->password=$this->request->data['edit_pswd_token'];
		 $user->modified=date("Y-m-d");
		 if($this->request->data["edit_image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"edit_image");
				//echo $image; exit;
		  		if($image)
				{
					    $user->image=$image;
						unlink("img/original/$image");
						unlink("img/large/$image");
						unlink("img/small/$image");
				}
				else
				{
				}
			}
			else
			{
				unset($user->image);
			}
			 if ($this->Users->save($user)) {
			  $this->Flash->set('The data has been successfully updated.');
			  $this->redirect(array("controller"=>"users","action"=>"list_supplier"));
			 }
			 else{
			  $this->Flash->set('The data could not be updated.Try again');
			  $this->redirect(array("controller"=>"users","action"=>"list_supplier")); 
			 }
		}
    }
    public function listFranchise(){	
    $this->viewBuilder()->setLayout('user');
      $datas=$this->Users->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Users.is_deleted' =>0,
				'Users.user_type' =>4
                ),
                'order' => array(
                'Users.id' => 'DESC'
                ),
				'limit' => 15
        ));
		$franchise_data = $datas->toArray();
		$this->set('franchise_data',json_encode($franchise_data));
    }
    public function addFranchiseData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
		 //pr($this->request->data);exit;
         $user = $this->Users->newEntity(); 
         $user->fname=$this->request->data['fname'];
         $user->lname=$this->request->data['lname'];		 
         $user->username=$this->request->data['username'];
		 $user->phone_number=$this->request->data['phone_number'];
         $user->address=$this->request->data['address'];	
		 $user->user_type=4;
		 $user->pswd_token=$this->request->data['pswd_token'];
		 $user->password=$this->request->data['pswd_token'];
		 $user->created=date("Y-m-d");
		 $user->modified=date("Y-m-d");
		 if($this->request->data["image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"image");
		  		if($image)
				{
					   $user->image=$image;
				}
				else
				{
				}
			}
			else
			{
			//unset($category->image);
			}
			 if ($this->Users->save($user)) {
			 // The $article entity contains the id now
			 //$id = $article->id;
			  $this->Flash->set('The data has been successfully added.');
			  $this->redirect(array("controller"=>"users","action"=>"list_franchise"));
			 }
			 else{
			  $this->Flash->set('The data could not be added.Try again');
			  $this->redirect(array("controller"=>"users","action"=>"list_franchise")); 
			 }
		}
    }
	public function viewFranchiseData(){
	    $id=$this->request->data['id'];
		$datas=$this->Users->get($id, array(
        'recursive' => -1,
		'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
                //'Users.id' => 'DESC'
            )
        ));
		$franchise_data = $datas->toArray();
		$this->set('franchise_data',json_encode($franchise_data));
    }
	public function ajaxFranchiseEditData(){
	     $id=$this->request->data['id'];
		 //echo $id;exit;
		 $datas=$this->Users->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$franchise_data = $datas->toArray();
		$this->set('franchise_data',json_encode($franchise_data));
    }
	public function editFranchiseData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
         $id=$this->request->data["edit_user_id"];
		 $user=$this->Users->get($id);
		 $user->fname=$this->request->data['edit_fname'];
		 $user->lname=$this->request->data['edit_lname'];
		 $user->username=$this->request->data['edit_username'];
		 $user->phone_number=$this->request->data['edit_phone_number'];
		 $user->address=$this->request->data['edit_address'];
		 $user->pswd_token=$this->request->data['edit_pswd_token'];
		 $user->password=$this->request->data['edit_pswd_token'];
		 $user->modified=date("Y-m-d");
		 if($this->request->data["edit_image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"edit_image");
				//echo $image; exit;
		  		if($image)
				{
					    $user->image=$image;
						unlink("img/original/$image");
						unlink("img/large/$image");
						unlink("img/small/$image");
				}
				else
				{
				}
			}
			else
			{
				unset($user->image);
			}
			 if ($this->Users->save($user)) {
			  $this->Flash->set('The data has been successfully updated.');
			  $this->redirect(array("controller"=>"users","action"=>"list_franchise"));
			 }
			 else{
			  $this->Flash->set('The data could not be updated.Try again');
			  $this->redirect(array("controller"=>"users","action"=>"list_franchise")); 
			 }
		}
    }
//	 public function deleteData($id=null){
//	    $id=$id;
//	    $user=$this->Users->get($id); 
//		$user->is_deleted=1;
//		if($this->Users->save($user))
//			{
//				$this->Flash->set('The user has been successfully deleted.');
//				$this->redirect(array("controller"=>"users","action"=>"list_user"));
//			}
//		else
//			{
//				$this->Session->setFlash(__("User Could Not Be Deleted!Try Again."));
//				$this->redirect(array("controller"=>"users","action"=>"list_user"));
//			}
//    }
//    public function changeStatus($id=null){
//		$user=$this->Users->get($id); // Return article with id 12
//		$status=$user->status;
//		if($status==1){
//			$user->status=0;	
//		}
//		else{
//			$user->status=1;	
//		}
//			if($this->Users->save($user))
//				{
//					$this->Flash->set('The Status has been successfully Changed.');
//					$this->redirect(array("controller"=>"users","action"=>"list_user"));
//				}
//				else
//				{
//					$this->Session->setFlash(__("Status Could Not Be Changed!Try Again."));
//					$this->redirect(array("controller"=>"users","action"=>"list_user"));
//				}
//    }
	public function imageUpload($data,$field)
	{
		$support_file=array("image/gif","image/jpeg","image/jpg","image/pjpeg","image/x-png","image/png");
		
		if(!empty($data[$field]["name"]))
			{
				if($data[$field]["error"]==0)
				{
					if(in_array($data[$field]["type"],$support_file))
					{
						$image= time().$data[$field]["name"];
						if(!move_uploaded_file($data[$field]["tmp_name"],"img/original/".$image))
						{
							$this->Flash->set(__("Image upload fail"));
							return false;
						}
						else
						{
							//create temp image
								copy("img/original/".$image,"img/large/".$image);
								$this->resize("img/large/".$image, 200, 200);
								copy("img/original/".$image,"img/small/".$image);
								$this->resize("img/small/".$image, 50, 50);
								copy("img/original/".$image,"img/medium/".$image);
								$this->resize("img/medium/".$image, 463, 414);
								
								return $image;
						}
					}
					else
					{
						$this->Flash->set(__("Image is not valid file"));
						return false;
					}
				}
				else
				{
					$this->Flash->set(__("Image file error."));
					return false;
				}
				
			}
			else
			{
				return false;
			}
	}

 //image resize function
	private function resize($imagePath, $destinationWidth, $destinationHeight) { 
        // The file has to exist to be resized 
        if(file_exists($imagePath)) { 
            // Gather some info about the image 
            $imageInfo = getimagesize($imagePath); 
             
            // Find the intial size of the image 
            $sourceWidth = $imageInfo[0]; 
            $sourceHeight = $imageInfo[1]; 
			
			
			if($sourceWidth > $sourceHeight)
			{
				$ratio=$sourceHeight/$sourceWidth;
				$destinationHeight=round($destinationWidth*$ratio);
			}
			elseif($sourceWidth < $sourceHeight)
			{
				$ratio=$sourceWidth/$sourceHeight;
				$destinationWidth=round($destinationHeight*$ratio);
			}
          
            // Find the mime type of the image 
            $mimeType = $imageInfo['mime']; 
             
            // Create the destination for the new image 
            $destination = imagecreatetruecolor($destinationWidth, $destinationHeight); 

            // Now determine what kind of image it is and resize it appropriately 
            if($mimeType == 'image/jpeg' || $mimeType == 'image/pjpeg') { 
                $source = imagecreatefromjpeg($imagePath); 
                imagecopyresampled($destination, $source, 0, 0, 0, 0, $destinationWidth, $destinationHeight, $sourceWidth, $sourceHeight);
                imagejpeg($destination, $imagePath); 
            } else if($mimeType == 'image/gif') { 
                $source = imagecreatefromgif($imagePath); 
                imagecopyresampled($destination, $source, 0, 0, 0, 0, $destinationWidth, $destinationHeight, $sourceWidth, $sourceHeight);
                imagegif($destination, $imagePath); 
            } else if($mimeType == 'image/png' || $mimeType == 'image/x-png') { 
                $source = imagecreatefrompng($imagePath); 
                imagecopyresampled($destination, $source, 0, 0, 0, 0, $destinationWidth, $destinationHeight, $sourceWidth, $sourceHeight);
                imagepng($destination, $imagePath); 
            } else { 
                $this->_error('This image type is not supported.'); 
            } 
             
            // Free up memory 
            imagedestroy($source); 
            imagedestroy($destination); 
        } 
		else { 
            $this->_error('The requested file does not exist.'); 
        } 
    }
    
    // Outputs errors... 
    private function _error($message) { 
        trigger_error('The file could not be resized for the following reason: ' . $message); 
    }	 
}
?>