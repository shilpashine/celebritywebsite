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
			pr($this->request->data);
			$user =$this->Users->get($userdata['id']);
			$user->fname=$this->request->data["fname"];
			$user->lname=$this->request->data["lname"];
			$user->phone_number=$this->request->data["phone_number"];
			$user->address=$this->request->data["address"];
			$user->username=$this->request->data["username"];			
			$user->pswd_token=$this->request->data["pswd_token"];
			$user->password=$this->request->data["pswd_token"];
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
    public function listUser(){	
         $this->viewBuilder()->setLayout('user');
        $datas=$this->Users->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Users.is_deleted' =>0
                ),
                'order' => array(
                'Users.id' => 'DESC'
                ),
				'limit' => 3
        ));
		$user_data = $datas->toArray();
		$this->set('user_data',json_encode($user_data));
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
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$customer_data = $datas->toArray();
		$this->set('customer_data',json_encode($customer_data));
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
	 public function deleteData($id=null){
	    $id=$id;
	    $user=$this->Users->get($id); 
		$user->is_deleted=1;
		if($this->Users->save($user))
			{
				$this->Flash->set('The user has been successfully deleted.');
				$this->redirect(array("controller"=>"users","action"=>"list_user"));
			}
		else
			{
				$this->Session->setFlash(__("User Could Not Be Deleted!Try Again."));
				$this->redirect(array("controller"=>"users","action"=>"list_user"));
			}
    }
    public function changeStatus($id=null){
		$user=$this->Users->get($id); // Return article with id 12
		$status=$user->status;
		if($status==1){
			$user->status=0;	
		}
		else{
			$user->status=1;	
		}
			if($this->Users->save($user))
				{
					$this->Flash->set('The Status has been successfully Changed.');
					$this->redirect(array("controller"=>"users","action"=>"list_user"));
				}
				else
				{
					$this->Session->setFlash(__("Status Could Not Be Changed!Try Again."));
					$this->redirect(array("controller"=>"users","action"=>"list_user"));
				}
    }
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