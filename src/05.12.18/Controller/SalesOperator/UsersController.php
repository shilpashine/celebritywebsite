<?php
namespace App\Controller\SalesOperator;
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
		  if($user['user_type']!=2){
			return $this->redirect($this->Auth->logout());
	        }
		  else{
			 	$this->Auth->allow(['login','logout','editProfile']);
 
		    }
	    }
	    else{
			 $this->Auth->allow(['login','logout','editProfile']);

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
			//pr($user);exit;
			if($user['user_type']==2 && $user['active']==1 && $user['is_deleted']==0){
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