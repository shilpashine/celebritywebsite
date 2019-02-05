<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class GeneralsController extends AppController {
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	    $user = $this->Auth->User();
	    if(!empty($user)){
		  if($user['user_type']!=0){
			return $this->redirect($this->Auth->logout());
	        }
		  else{
			 	$this->Auth->allow(['editProfile','listLead','viewRemark','tax','contactUs']);
 
		    }
	    }
	    else{
			 $this->Auth->allow(['editProfile','listLead','viewRemark','tax','contactUs']);

	    }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Users');
		$this->loadModel('TaxDetails');
                $this->loadModel('ContactCmsDetails');
        $this->loadComponent('RequestHandler');
    } 
	
	public function tax() {
	  //  $this->viewBuilder()->setLayout('default1');
	    $userdata=$this->Auth->User();
            $id=1;
        $datas=$this->TaxDetails->get($id, array(
         'recursive' => -1,
		
	   
        'order' => array(
                'TaxDetails.id' => 'DESC'
            )
        ));
		$user_data = $datas->toArray();
              //  pr($user_data);exit;
		$this->set('user_data',json_encode($user_data));
                
		if($this->request->is("post") or $this->request->is("put")){
			
                    $usersTable33 = TableRegistry::get('TaxDetails');
                $id23=$this->request->data["edit_user_id"];
                $user = $usersTable33->get($id23);

                
                
			
			
			$user->tax_amout=$this->request->data["tax"];
			$user->modified=date("Y-m-d");
			$user->created=date("Y-m-d");
			if($this->TaxDetails->save($user))
				{
				    $this->Flash->set('The Tax has been successfully updated.');
					$this->redirect(array("controller"=>"generals","action"=>"tax"));	
				}
				
				else
				{
					$this->Flash->set(__("Data Could Not Be Updated"));
					$this->redirect(array("controller"=>"dashboards","action"=>"index"));
				}
		}
    }
    public function contactUs() {
	  //  $this->viewBuilder()->setLayout('default1');
	    $userdata=$this->Auth->User();
            $id=1;
        $datas=$this->ContactCmsDetails->get($id, array(
         'recursive' => -1,
		
	   
        'order' => array(
                'ContactCmsDetails.id' => 'DESC'
            )
        ));
		$user_data = $datas->toArray();
              //  pr($user_data);exit;
		$this->set('user_data',json_encode($user_data));
                
		if($this->request->is("post") or $this->request->is("put")){
			
                    $usersTable33 = TableRegistry::get('ContactCmsDetails');
                $id23=$this->request->data["edit_user_id"];
                $user = $usersTable33->get($id23);

                $user->email=$this->request->data["email"];
                $user->address=$this->request->data["address"];
                $user->phone=$this->request->data["phone"];
                $user->alt_ph=$this->request->data["alt_ph"];
                $user->fb_link=$this->request->data["fb_link"];
                $user->ins_link=$this->request->data["ins_link"];
                $user->tw_link=$this->request->data["tw_link"];
                $user->gm_link=$this->request->data["gm_link"];
                $user->yu_link=$this->request->data["yu_link"];
                
			$user->modified=date("Y-m-d");
			$user->created=date("Y-m-d");
			if($this->ContactCmsDetails->save($user))
				{
				    $this->Flash->set('The Contact  has been successfully updated.');
					$this->redirect(array("controller"=>"generals","action"=>"contact_us"));	
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