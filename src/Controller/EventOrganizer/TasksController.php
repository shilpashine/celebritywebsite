<?php
namespace App\Controller\Manager;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class TasksController extends AppController {
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	    $user = $this->Auth->User();
	    if(!empty($user)){
		  if($user['user_type']!=4){
			return $this->redirect($this->Auth->logout());
	        }
		  else{
			 	$this->Auth->allow(['login','logout','editProfile','listTask','viewTask','fetchTask','editTask']);
 
		    }
	    }
	    else{
			 $this->Auth->allow(['login','logout','editProfile','listTask','viewTask','fetchTask','editTask']);

	    }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Users');
		$this->loadModel('Policies');
        $this->loadComponent('RequestHandler');
    } 
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
			//pr($user);exit;
			if($user['user_type']==4 && $user['active']==1 && $user['is_deleted']==0){
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
	public function listTask(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default');
        $datas=$this->Tasks->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Tasks.is_deleted' =>0
				//'Tasks.user_id' =>$userdata['id']
                ),
                'order' => array(
                'Tasks.id' => 'DESC'
                )
        ));
		$task_data = $datas->toArray();
		$this->set('task_data',json_encode($task_data));
		if($this->request->is("post") or $this->request->is("put")){
		//pr($this->request->data);
        $task = $this->Tasks->newEntity(); 
        //$policy_date=$this->request->data['task_date'];
		//$exploded_policy_date=explode("-",(string)($policy_date));
		//$policydate=$exploded_policy_date[2]."-".$exploded_policy_date[1]."-".$exploded_policy_date[0];
        //$policy->policy_date=$policy_date;
		$task->user_id=$userdata['id'];
		$task->modifier_id=$userdata['id'];
		$task->created_by=$userdata['fname']." ".$userdata['lname'];
		$task->modified_by=$userdata['fname']." ".$userdata['lname'];
		$task->creator_type="Manager";
		$task->modifier_type="Manager";
		$task->company_name=$this->request->data['company_name'];
		$task->fname=$this->request->data['fname'];
		$task->mname=$this->request->data['mname'];
		$task->lname=$this->request->data['lname'];
		$task->work_name=$this->request->data['work_name'];
		$task->phone=$this->request->data['phone'];
		$task->email_id=$this->request->data['email_id'];
		$task->created=date("Y-m-d H:i:s");
		$task->modified=date("Y-m-d H:i:s");
         if ($this->Tasks->save($task)) {
		  $this->Flash->set('The data has been successfully added.');
		  $this->redirect(array("controller"=>"tasks","action"=>"list_task"));
         }
		 else{
		  $this->Flash->set('The data could not be added.Try again');
		  $this->redirect(array("controller"=>"tasks","action"=>"list_task")); 
		 }
		 }
		}
		else
				{
					
					$this->redirect(array("controller"=>"users","action"=>"login"));
				}
    }
	public function viewTask(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
		 $task_id=$this->request->data['task_id'];
		 //echo $lead_id;exit;
		$task_view_datas=$this->Tasks->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Tasks.is_deleted' =>0,
				'Tasks.id' =>$task_id
                ),
                'order' => array(
                'Tasks.id' => 'DESC'
                )
        ));
		
		$task_view_data = $task_view_datas->first();
		//pr($task_view_data);exit;
		if(!empty($task_view_data)){
		$this->set('task_view_data',json_encode($task_view_data));
		}
		}
		else
		{
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
		
    }
	public function fetchTask(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
		 $task_id=$this->request->data['task_id'];
		 //echo $lead_id;exit;
		$task_fetch_datas=$this->Tasks->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Tasks.is_deleted' =>0,
				'Tasks.id' =>$task_id
                ),
                'order' => array(
                'Tasks.id' => 'DESC'
                )
        ));
		
		$task_fetch_data = $task_fetch_datas->first();
		//pr($lead_fetch_data);exit;
		if(!empty($task_fetch_data)){
		$this->set('task_fetch_data',json_encode($task_fetch_data));
		}
		}
		else
		{
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
		
    }
	public function editTask() {
	    $userdata=$this->Auth->User();	
        if(!empty($userdata)){	
		if($this->request->is("post") or $this->request->is("put")){
			//pr($this->request->data);exit;
			$task_id=$this->request->data["edit_task_id"];
			$edit_task=$this->Tasks->get($task_id);
			$edit_task->modifier_id=$userdata['id'];
			//$edit_task->created_by=$userdata['fname']." ".$userdata['lname'];
			$edit_task->modified_by=$userdata['fname']." ".$userdata['lname'];
			//$edit_task->creator_type="Sales Operator";
			$edit_task->modifier_type="Manager";
			$edit_task->company_name=$this->request->data['edit_company_name'];
			$edit_task->fname=$this->request->data['edit_fname'];
			$edit_task->mname=$this->request->data['edit_mname'];
			$edit_task->lname=$this->request->data['edit_lname'];
			$edit_task->work_name=$this->request->data['edit_work_name'];
			$edit_task->phone=$this->request->data['edit_phone'];
			$edit_task->email_id=$this->request->data['edit_email_id'];
			$edit_task->modified=date("Y-m-d H:i:s");
			if($this->Tasks->save($edit_task))
				{
				    $this->Flash->set('The data has been successfully updated.');
					$this->redirect(array("action"=>"listTask"));	
				}
				
				else
				{
					$this->Flash->set(__("Data Could Not Be Updated"));
					$this->redirect(array("action"=>"listTask"));
				}
		}
		}
		else
		{
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
    }
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