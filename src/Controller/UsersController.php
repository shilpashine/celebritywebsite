<?php
namespace App\Controller;
//namespace App\Http\Session;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
//use Cake\Auth\DefaultPasswordHasher;
use Cake\Routing\Router;

class UsersController extends AppController {
    public function beforeFilter(Event $event)
    {
            
    parent::beforeFilter($event);
//    $user4 = $this->Auth->User();
//  
//        if(!empty($user4)){
//          
//            if($user4['user_type']!=4){
//		return $this->redirect($this->Auth->logout());
//                        
//	        }
//		  else{
//	  $this->Auth->allow(['add','logout','index','editProfile','editProfileFpart','photoUpload']);
//                  }
//	    }
//           else{
//			 $this->Auth->allow(['register','login']);
//
//	    }  
//            
//            
            $user = $this->Auth->User();
	    if(!empty($user)){
		  if($user['user_type']!=1){
			return $this->redirect($this->Auth->logout());
	        }
		  else{
		   $this->Auth->allow(['login','logout','editProfile','index','','addData','editData','listStaff','addStaffData','viewStaffData','ajaxStaffEditData','editStaffData','listCustomer','listDesigner','listSupplier','listFranchise','addCustomerData','viewCustomerData','ajaxCustomerEditData','editCustomerData','addDesignerData','viewDesignerData','ajaxDesignerEditData','editDesignerData','addSupplierData','viewSupplierData','ajaxSupplierEditData','editSupplierData','addFranchiseData','viewFranchiseData','ajaxFranchiseEditData','editFranchiseData','currentBooking']);
		    }
	    }
		else{
		  $this->Auth->allow(['login','logout','editProfile','register']);
		}
            
        
    }
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
		$this->loadModel('UserDetails');
        $this->loadComponent('RequestHandler');
        $this->loadModel('EventOrders');
        $this->loadModel('EventTicketCodeDetails');
      $this->loadModel('EventTicketDetails');
                  
       
        
    } 
    public function login() {
        if ($this->request->is('post')) {
           
            $user = $this->Auth->identify();
            if ($user) {
               // pr($user);exit;
                $this->Auth->setUser($user);
             if(!empty($this->request->session()->read('eventdetail.current_event_detail_id'))){
               
                $lastid11=$this->request->session()->read('eventdetail.current_event_detail_id');
		$this->redirect(array("controller"=>"event-details","action"=>"event_detail",$lastid11));	
                  }else{
                      
                  
              if($user['user_type']==1 && $user['is_deleted']==0  && $user['active']==1){
		$this->redirect(array("controller"=>"users","action"=>"index"));
             
               
                 }else{
            
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        }
            }
            
        }     }
 /*public function admin_login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                //return $this->redirect($this->Auth->redirectUrl());
				$this->redirect(array("controller"=>"users","action"=>"dashboard"));
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }*/
    
    public function  editProfileFpart(){
         $fname=$this->request->data['fname'];
          $lname=$this->request->data['lname'];
           $location=$this->request->data['location'];
            $locality=$this->request->data['locality'];
            
             $country=$this->request->data['country'];
             $username=$this->request->data['username'];
             $email=$this->request->data['email'];
             $phone=$this->request->data['phone'];
             $postal_code=$this->request->data['postal_code'];
             $username=$this->request->data['username'];
                
             $user_id=$this->request->data['user_id'];
                $usersTable = TableRegistry::get('Users');
                $id=$user_id;
                       $user = $usersTable->get($id);
            
              
              
                        $user->fname=$fname;
			$user->lname=$lname;
			$user->address=$location;
                        $user->city=$locality;
                         $user->country=$country;
			$user->email=$email;
                        $user->phone_number=$phone;
                         $user->postal_code=$postal_code;
                         $user->username=$username;
                        
                        if($this->Users->save($user))
				{
				  echo 1;exit;	
				}
				
				else
				{
					  echo 0;exit;	
				}
		}
    
         
    public function photoUpload(){
         $userdata=$this->Auth->User();	
           //  pr($userdata);exit;
        $this->autoRender = false;

        if(!empty($userdata)){	
            
            
       
         if($this->request->is("post") or $this->request->is("put")){
            $usersTable = TableRegistry::get('Users');
                $user11 = $usersTable->get($this->request->data["user_id"]);
         
               // pr($this->request->data);exit;
                        if(!empty($this->request->data["image"])){
				if($this->request->data["image"]["name"])
				{
					$image=$this->imageUpload($this->request->data,"image");
					//echo $image; exit;
					if($image)
					{
							$user11->image=$image;
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
				unset($user11->image);
			}
                        
                         //pr($user11);exit;
			if($this->Users->save($user11))
				{
                      
				    $this->Flash->set('The data has been successfully updated.');
                                   
                                        $this->redirect(array("controller"=>"users","action"=>"index"));	
                                    
				}
				
				else
				{
					$this->Flash->set(__("Data Could Not Be Updated"));
					$this->redirect(array("controller"=>"users","action"=>"index"));
				}
         }
        }
    }

    public function register() {
        $this->viewBuilder()->setLayout('login');
                 
         if($this->request->is("post") or $this->request->is("put")){
		$usersTable = TableRegistry::get('Users');
                $user = $usersTable->newEntity();

			$user->fname=$this->request->data["fname"];
			$user->lname=$this->request->data["lname"];
                        
                        if(!empty($this->request->data["email"])){
			$user->email=$this->request->data["email"];
                        
                        }
                        
                        $user->phone_number=$this->request->data["phno"];
                        
                        $user->username=$this->request->data["phno"];
                        $user->address=$this->request->data["address"];
                        $user->country=$this->request->data["country"];
                         $user->city=$this->request->data["city"];
                          $user->postal_code=$this->request->data["zip"];
                         
                        
                        
                        $user->password=$this->request->data["password"];
                        $user->pswd_token=$this->request->data["password"];
                        
                       
			$user->user_type=1;
			$user->modified=date("Y-m-d");
			
                      
                        
			if($this->Users->save($user))
				{
				    $this->Flash->set('The data has been successfully Saved.');
					$this->redirect(array("controller"=>"users","action"=>"login"));	
				}
				
				else
				{
					$this->Flash->set(__("Data Could Not Be Updated"));
					$this->redirect(array("controller"=>"users","action"=>"register"));
				}
		}
    }
    public function logout() {
        //echo "Un Expected logout";exit;
        return $this->redirect($this->Auth->logout());
    }
    //Below are basic crud methods of UsersController
	public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
 
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
 
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
	public function index() {
        $userdata1=$this->Auth->User();	
      //  pr($userdata);
        if(!empty($userdata1)){
        
             $id1=$userdata1['id'];
        $datas=$this->Users->find('all', array(
         'recursive' => -1,
		
	    'conditions'=>array(
		'Users.id' =>$id1
                ),
                'order' => array(
                'Users.id' => 'DESC'
                )
        ));
		$user_data = $datas->toArray();
		//pr($user_data);
		$this->set('user_data',$user_data);
                
                 $data_all=$this->EventOrders->find('all', array(
         'recursive' => -1,
		'contain'=>array('EventDetails'=>array('EventPhotos','EventCategories'=>['Categories']),'EventTicketCodeDetails'=>['EventTicketDetails']),
	    'conditions'=>array(
		'EventOrders.isdeleted' =>0,
                'EventOrders.user_id' =>$id1,
			 'EventOrders.status' =>1	
                ),
                'order' => array(
                'EventOrders.id' => 'DESC'
                )
        ));
		$data_all = $data_all->toArray();
//       / pr($data_all);exit;
                if(!empty($data_all)){
		$this->set('data_all',json_encode($data_all));
             // echo 'hhhhh';
		}
          
    } else{
            
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
        }
        
        
        public function currentBooking() {
        $userdata1=$this->Auth->User();	
      //  pr($userdata);
        $date=date('Y-m-d');
        if(!empty($userdata1)){
        
             $id1=$userdata1['id'];
        
                
                 $data_all=$this->EventOrders->find('all', array(
         'recursive' => -1,
		'contain'=>array('EventDetails'=>array('EventPhotos','EventCategories'=>['Categories']),'EventTicketCodeDetails'=>['EventTicketDetails']),
	    'conditions'=>array(
		'EventOrders.isdeleted' =>0,
                'EventOrders.user_id' =>$id1,
                'EventOrders.status' =>1,
                 'EventOrders.event_date >' =>$date
				
                ),
                'order' => array(
                'EventOrders.id' => 'DESC'
                )
        ));
		$data_all = $data_all->toArray();
//       / pr($data_all);exit;
                if(!empty($data_all)){
		$this->set('data_all',json_encode($data_all));
             // echo 'hhhhh';
		}
          
    } else{
            
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
        }
        
          public function bookingHistory() {
        $userdata1=$this->Auth->User();	
      //  pr($userdata);
        $date=date('Y-m-d');
        if(!empty($userdata1)){
        
             $id1=$userdata1['id'];
        
                
                 $data_all=$this->EventOrders->find('all', array(
         'recursive' => -1,
		'contain'=>array('EventDetails'=>array('EventPhotos','EventCategories'=>['Categories']),'EventTicketCodeDetails'=>['EventTicketDetails']),
	    'conditions'=>array(
		'EventOrders.isdeleted' =>0,
                'EventOrders.user_id' =>$id1,
                'EventOrders.status' =>1,
                 'EventOrders.event_date <' =>$date
				
                ),
                'order' => array(
                'EventOrders.id' => 'DESC'
                )
        ));
		$data_all = $data_all->toArray();
//       / pr($data_all);exit;
                if(!empty($data_all)){
		$this->set('data_all',json_encode($data_all));
             // echo 'hhhhh';
		}
          
    } else{
            
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
        }
        
    public function editPassword(){
        
         $userdata=$this->Auth->User();	
        //   pr($userdata);exit;
        if(!empty($userdata)){	
            $id=$userdata['id'];
           
            $datas=$this->Users->find('all', array(
         'recursive' => -1,
		
	    'conditions'=>array(
		'Users.id' =>$id
                ),
                'order' => array(
                'Users.id' => 'DESC'
                )
        ));
            $user_data = $datas->toArray();
             //   pr($user_data);exit;
            
               $password=$this->request->data['password'];
          $new_password=$this->request->data['new_password'];
           $c_password=$this->request->data['c_password'];
           
           
            
         
         if($user_data[0]['pswd_token']==$password){

         if($new_password==$c_password){
             
             
             
             
             $usersTable = TableRegistry::get('Users');
             $user = $usersTable->get($id);
            
             
              
                        $user->password=$new_password;
			$user->pswd_token=$new_password;
			
			
                        if($this->Users->save($user))
				{
				  echo 1;exit;	
				}
				
				else
				{
					  echo 0;exit;	
				} 
             
             
             
          
             
         }else{
                            echo 2;exit;

             
         }
                       }
            
        }
    }
    public function editProfile() {
     
$user22=$this->Auth->User();	

       // pr($user);exit;
     //   $this->autoRender = false;

        if(!empty($user22)){	
        $this->viewBuilder()->setLayout('default1');      
            $id=$user22['id']; 
   
        $datas=$this->Users->find('all', array(
         'recursive' => -1,
		
	    'conditions'=>array(
		'Users.id' => $id	//'Users.deleted' =>0
                ),
                'order' => array(
                'Users.id' =>'DESC'	
                )
        ));
		$user_data = $datas->toArray();
		//pr($user_data);exit;
		$this->set('user_data',$user_data);		
        //$this->set(compact('characters'));   
  //  }
                     }
                     else{
                         
                        $this->redirect(array("controller"=>"users","action"=>"login"));
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