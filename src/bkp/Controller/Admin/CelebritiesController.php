<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class CelebritiesController extends AppController {
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	    $user = $this->Auth->User();
	    if(!empty($user)){
		  if($user['user_type']!=0){
			return $this->redirect($this->Auth->logout());
	        }
		  else{
			 	$this->Auth->allow(['editProfile','listLead','viewRemark']);
 
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
		$this->loadModel('Celebrities');
		$this->loadModel('Remarks');
        $this->loadComponent('RequestHandler');
    } 
	public function listCelebrity(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
         
         $celebrity_datas=$this->Users->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				
				'Users.user_type' =>2
                ),
                'order' => array(
                'Users.id' => 'DESC'
                )
        ));
		$celebrity_datas = $celebrity_datas->toArray();
		//pr($celebrity_datas);exit;
		if(!empty($celebrity_datas)){
		$this->set('celebrity_datas',json_encode($celebrity_datas));
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
		 //echo "hii";exit;
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
	public function addCelebrity() {
	    $this->viewBuilder()->setLayout('default_datatable');
	    $userdata=$this->Auth->User();
      if(!empty($userdata)){	
		if($this->request->is("post") or $this->request->is("put")){
			pr($this->request->data);
			$user =$this->Users->get($userdata['id']);
			$user->fname=$this->request->data["fname"];
			$user->lname=$this->request->data["lname"];
			$user->email=$this->request->data["email"];
                        $user->phone_number=$this->request->data["phone_no"];
                        
			$user->gendar=$this->request->data["gendar"];
			$user->description=$this->request->data["description"];			
			$user->address=$this->request->data["address"];
			
			$user->modified=date("Y-m-d");
			
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