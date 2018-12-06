<?php
namespace App\Controller\Franchise;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class MessagesController extends AppController
{
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	    $user = $this->Auth->User();
	    if(!empty($user)){
		  if($user['user_type']!=4){
			return $this->redirect($this->Auth->logout());
            //$this->Flash->error(__('You Are Not Authorized To Access This Area!'));			
	        }
		  else{
			 $this->Auth->allow(['login','logout','listAdminMessage','listOtherMessage','viewData','deleteData','changeStatus','editData','ajaxEditData','addData','replyAjaxEditData','replyEditData']); 
		    }
	    }
	    else{
			 $this->Auth->allow(['login','logout','listAdminMessage','listOtherMessage','viewData','deleteData','changeStatus','editData','ajaxEditData','addData','replyAjaxEditData','replyEditData']); 
	    }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Messages');
		$this->loadModel('MessageReplies');
		$this->loadModel('Users');
        $this->loadComponent('RequestHandler');
    } 
	public function listAdminMessage(){	
      $this->viewBuilder()->setLayout('user');
      $datas=$this->Messages->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 ),
	    'conditions'=>array(
				'Messages.is_deleted' =>0,
				'Messages.user_type' =>0
                ),
                'order' => array(
                'Messages.id' => 'DESC'
                )
        ));
		$message_data = $datas->toArray();
		$this->set('message_data',json_encode($message_data));
    }
	public function listMessage(){	
      $this->viewBuilder()->setLayout('user');
      $datas=$this->Messages->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 ),
	    'conditions'=>array(
				'Messages.is_deleted' =>0
                ),
                'order' => array(
                'Messages.id' => 'DESC'
                )
        ));
		$message_data = $datas->toArray();
		$this->set('message_data',json_encode($message_data));
    }
	public function listOtherMessage(){	
      $this->viewBuilder()->setLayout('user');
      $datas=$this->Messages->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 ),
	    'conditions'=>array(
				'Messages.is_deleted' => 0,
				'Messages.user_type !=' => 0
                ),
                'order' => array(
                'Messages.id' => 'DESC'
                )
        ));
		$message_data = $datas->toArray();
		$this->set('message_data',json_encode($message_data));
    }
    public function addData(){
		 $this->viewBuilder()->setLayout('user');
		 $user_id=$this->Auth->User();
		 $id=$user_id['id'];
		 $userdata=$this->Users->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Users.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$user_data = $userdata->toArray();
		$user_type=$user_data['user_type'];
		 if($this->request->is("post") or $this->request->is("put")){
         $message = $this->Messages->newEntity(); 			
		 $message->subject=$this->request->data['subject'];
		 $message->message=$this->request->data['message'];
		 $message->user_id=$id;
		 $message->user_type=$user_type;
		 $message->created=date("Y-m-d");
		 $message->modified=date("Y-m-d");
         if ($this->Messages->save($message)) {
         // The $article entity contains the id now
         //$id = $article->id;
		  $this->Flash->set('The data has been successfully added.');
		  $this->redirect(array("controller"=>"messages","action"=>"list_message"));
         }
		 else{
		  $this->Flash->set('The data could not be added.Try again');
		  $this->redirect(array("controller"=>"messages","action"=>"list_message")); 
		 }
		 }
         }
		 
    public function ajaxEditData(){
	     $id=$this->request->data['id'];
		 //echo $id;exit;
		 $datas=$this->Messages->get($id, array(
         'recursive' => -1,
		 'contain' => array(
		 'MessageReplies' =>array('Users')
	    ),
	    'conditions'=>array(
                'Messages.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$message_data = $datas->toArray();
		//pr($message_data);
		$this->set('message_data',json_encode($message_data));
    }
    public function replyAjaxEditData(){
	     $id=$this->request->data['id'];
		 //echo $id;exit;
		 $datas=$this->MessageReplies->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'MessageReplies.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$reply_msg_data = $datas->toArray();
		//pr($message_data);exit;
		$this->set('reply_msg_data',json_encode($reply_msg_data));
    }		
    public function editData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
         $id=$this->request->data["edit_message_id"];
		 $message=$this->Messages->get($id);
		 $message->message=$this->request->data['edit_message'];
		 $message->modified=date("Y-m-d");
         if ($this->Messages->save($message)) {
		      $this->Flash->set('The data has been successfully updated.');
		      $this->redirect(array("controller"=>"messages","action"=>"list_admin_message"));
            }
		 else{
		      $this->Flash->set('The data could not be updated.Try again');
		      $this->redirect(array("controller"=>"messages","action"=>"list_admin_message")); 
		    }
		 }
    }
	public function replyEditData(){
		//pr($this->request->data);exit;
		 $message_id=$this->request->data['message_id'];
		 $message_reply_id=$this->request->data['message_reply_id'];
		 $edit_reply=$this->request->data['edit_reply'];
		 /*echo $message_id;
		 echo $message_reply_id;
		 echo $edit_reply;exit;*/
		 $message_reply=$this->MessageReplies->get($message_reply_id);
		 $message_reply->reply=$edit_reply;
		 if ($this->MessageReplies->save($message_reply)) {
		      //$this->Flash->set('The data has been successfully updated.');
		      //$this->redirect(array("controller"=>"messages","action"=>"list_admin_message"));
			  echo "Reply Successfully updated";
            }
		 else{
		      //$this->Flash->set('The data could not be updated.Try again');
		      //$this->redirect(array("controller"=>"messages","action"=>"list_admin_message")); 
			  echo "Reply Could Not Be Updated.Try Again";
		    }
			exit;
    }
    public function viewData(){
	     $id=$this->request->data['id'];
		 $datas=$this->Categories->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Categories.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$category_data = $datas->toArray();
		$parent_id=$category_data['parent_id'];
		if($parent_id!=0){
		$parent_datas=$this->Categories->get($parent_id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Categories.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$parent_category_data = $parent_datas->toArray();
		$parent_name=$parent_category_data['category_name'];
		$category_data['parent_name']=$parent_name;
		}
		$this->set('category_data',json_encode($category_data));
    }
    public function deleteData($id=null){
	        $id=$id;
			$message=$this->Messages->get($id); 
			$message->is_deleted=1;
			$datas=$this->MessageReplies->find('all', array(
			 'recursive' => -1,
			 'contain' => array(
			),
			'conditions'=>array(
					'MessageReplies.is_deleted' =>0,
					'MessageReplies.message_id' =>$id
				),
			'order' => array(
			        'MessageReplies.id' => 'DESC'
				)
			));
		    $message_data = $datas->toArray();
			//pr($message_data);exit;
			if($this->Messages->save($message))
				{
					if(!empty($message_data)){
					for($i=0;$i<count($message_data);$i++){
						$id=$message_data[$i]['id'];
						$message_reply=$this->MessageReplies->get($id); 
						$message_reply->is_deleted=1;
						$this->MessageReplies->save($message_reply);		
					}
					}
					$this->Flash->set('The Data Has Been Successfully Deleted.');
					$this->redirect(array("controller"=>"messages","action"=>"list_message"));
				}
				else
				{
					$this->Session->setFlash(__("Data Could Not Be Deleted!Try Again."));
					$this->redirect(array("controller"=>"messages","action"=>"list_message"));
				}
    }
    public function changeStatus($id=null){
			$message=$this->Messages->get($id);
			$status=$message->status;
			if($status==1){
			$message->status=0;	
			}
			else{
			$message->status=1;	
			}
			if($this->Messages->save($message))
				{
					$this->Flash->set('The Status has been successfully Changed.');
					$this->redirect(array("controller"=>"messages","action"=>"list_message"));
				}
				else
				{
					$this->Session->setFlash(__("Status Could Not Be Changed!Try Again."));
					$this->redirect(array("controller"=>"messages","action"=>"list_message"));
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
        } else { 
            $this->_error('The requested file does not exist.'); 
        } 
    }
    
    // Outputs errors... 
    private function _error($message) { 
        trigger_error('The file could not be resized for the following reason: ' . $message); 
    }	
}
