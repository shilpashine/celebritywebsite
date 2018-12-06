<?php
namespace App\Controller\Manager;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class LeadsController extends AppController {
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	    $user = $this->Auth->User();
	    if(!empty($user)){
		  if($user['user_type']!=4){
			return $this->redirect($this->Auth->logout());
	        }
		  else{
			 	$this->Auth->allow(['editProfile','listPolicy','addRemark','viewRemark','viewLead','fetchLead','editLead']);
 
		    }
	    }
	    else{
			 $this->Auth->allow(['editProfile','listPolicy','addRemark','viewRemark','viewLead','fetchLead','editLead']);

	    }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Users');
		$this->loadModel('Leads');
		$this->loadModel('Remarks');
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
	public function listLead(){
        $userdata=$this->Auth->User();	
		//pr($userdata);exit;
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default');
        $datas=$this->Leads->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Leads.is_deleted' =>0
				//'Leads.user_id' =>$userdata['id']
                ),
                'order' => array(
                'Leads.id' => 'DESC'
                )
        ));
		$lead_data = $datas->toArray();
		if(!empty($lead_data)){
		$this->set('lead_data',json_encode($lead_data));
		}
		if($this->request->is("post") or $this->request->is("put")){
		//pr($this->request->data);exit;
        $lead = $this->Leads->newEntity(); 
        //$lead_data=$this->request->data['lead_data'];
		//$exploded_policy_date=explode("-",(string)($policy_date));
		//$policydate=$exploded_policy_date[2]."-".$exploded_policy_date[1]."-".$exploded_policy_date[0];
        //$lead->policy_date=$policy_date;
		//$lead->user_id=$userdata['id'];
		//$lead->user_type="OperatorAdmin";
		$lead->user_id=$userdata['id'];
		$lead->modifier_id=$userdata['id'];
		$lead->created_by=$userdata['fname']." ".$userdata['lname'];
		$lead->modified_by=$userdata['fname']." ".$userdata['lname'];
		$lead->creator_type="Manager";
		$lead->modifier_type="Manager";
		$lead->client_name=$this->request->data['client_name'];
		$lead->client_phone_no=$this->request->data['client_phone_no'];
		$lead->client_address=$this->request->data['client_address'];
		$lead->ref_name=$this->request->data['ref_name'];
		$lead->ref_phone_no=$this->request->data['ref_phone_no'];
		//$lead->remarks=$this->request->data['remarks'];
		$lead->created=date("Y-m-d H:i:s");
		$lead->modified=date("Y-m-d H:i:s");
         if ($this->Leads->save($lead)) {
		  $this->Flash->set('The data has been successfully added.');
		  $this->redirect(array("controller"=>"leads","action"=>"list_lead"));
         }
		 else{
		  $this->Flash->set('The data could not be added.Try again');
		  $this->redirect(array("controller"=>"leads","action"=>"list_lead")); 
		 }
		 }
		}
		else
				{
					
					$this->redirect(array("controller"=>"users","action"=>"login"));
				}
    }
	public function viewRemark(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
		 $lead_id=$this->request->data['lead_id'];
		 //echo $lead_id;exit;
		$lead_remark_datas=$this->Remarks->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Remarks.is_deleted' =>0,
				'Remarks.lead_id' =>$lead_id
                ),
                'order' => array(
                'Remarks.id' => 'DESC'
                )
        ));
		
		$lead_remark_data = $lead_remark_datas->toArray();
		//pr($lead_remark_data);exit;
		if(!empty($lead_remark_data)){
		$this->set('lead_remark_data',json_encode($lead_remark_data));
		}
		}
		else
		{
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
		
    }
	public function addRemark(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
		 
         $lead_remark_data = $this->Remarks->newEntity();
		 $lead_remark_data->lead_id=$this->request->data['lead_id'];
         $lead_remark_data->reminder=$this->request->data['reminder'];
		 $lead_remark_data->met_on=$this->request->data['met_on'];
		 $lead_remark_data->remark=$this->request->data['remark'];
		 $lead_remark_data->created=date("Y-m-d H:i:s");
		 $lead_remark_data->modified=date("Y-m-d H:i:s");
         if ($this->Remarks->save($lead_remark_data)) {
		      $this->Flash->set('The data has been successfully added.');
			  $this->redirect(array("controller"=>"leads","action"=>"list_lead"));
            }
		 else{
		      $this->Flash->set('The data could not be added.Try again');
			  $this->redirect(array("controller"=>"leads","action"=>"list_lead")); 
		    }
         }
    }
	public function viewLead(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
		 $lead_id=$this->request->data['lead_id'];
		 //echo $lead_id;exit;
		$lead_view_datas=$this->Leads->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Leads.is_deleted' =>0,
				'Leads.id' =>$lead_id
                ),
                'order' => array(
                'Leads.id' => 'DESC'
                )
        ));
		
		$lead_view_data = $lead_view_datas->first();
		//pr($lead_remark_data);exit;
		if(!empty($lead_view_data)){
		$this->set('lead_view_data',json_encode($lead_view_data));
		}
		}
		else
		{
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
		
    }
	public function fetchLead(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
		 $lead_id=$this->request->data['lead_id'];
		 //echo $lead_id;exit;
		$lead_fetch_datas=$this->Leads->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Leads.is_deleted' =>0,
				'Leads.id' =>$lead_id
                ),
                'order' => array(
                'Leads.id' => 'DESC'
                )
        ));
		
		$lead_fetch_data = $lead_fetch_datas->first();
		//pr($lead_fetch_data);exit;
		if(!empty($lead_fetch_data)){
		$this->set('lead_fetch_data',json_encode($lead_fetch_data));
		}
		}
		else
		{
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
		
    }
	public function editLead() {
	    $userdata=$this->Auth->User();	
        if(!empty($userdata)){	
		if($this->request->is("post") or $this->request->is("put")){
			//pr($this->request->data);exit;
			$lead_id=$this->request->data["edit_lead_id"];
			$edit_lead=$this->Leads->get($lead_id);
			//$lead->user_id=$userdata['id'];
			$edit_lead->modifier_id=$userdata['id'];
			//$lead->created_by=$userdata['fname']." ".$userdata['lname'];
			$edit_lead->modified_by=$userdata['fname']." ".$userdata['lname'];
			//$lead->creator_type="Sales Operator";
			$edit_lead->modifier_type="Manager";
			$edit_lead->client_name=$this->request->data["edit_client_name"];
			$edit_lead->client_phone_no=$this->request->data["edit_client_phone_no"];
			$edit_lead->client_address=$this->request->data["edit_client_address"];
			$edit_lead->ref_name=$this->request->data["edit_ref_name"];
			$edit_lead->ref_phone_no=$this->request->data["edit_ref_phone_no"];			
			$edit_lead->modified=date("Y-m-d");
			if($this->Leads->save($edit_lead))
				{
				    $this->Flash->set('The data has been successfully updated.');
					$this->redirect(array("action"=>"listLead"));	
				}
				
				else
				{
					$this->Flash->set(__("Data Could Not Be Updated"));
					$this->redirect(array("action"=>"listLead"));
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
			//pr($this->request->data);
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