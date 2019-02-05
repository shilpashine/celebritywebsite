<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class CmsDetailsController extends AppController {
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
		 $this->loadModel('Categories');
                 $this->loadModel('CmsDetails');
                  $this->loadModel('CmsPosts');
               
                 
                  
                      
                 //   'EventCategories','EventCelebrities','EventOrganizers'
              
        $this->loadComponent('RequestHandler');
    } 
	
  
    
    public function allCms(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
         
      //  CmsDetails
         
         $data_all=$this->CmsDetails->find('all', array(
         'recursive' => -1,
		
	    'conditions'=>array(
		'CmsDetails.isdeleted' =>0,
              
				
                ),
                'order' => array(
                'CmsDetails.id' => 'DESC'
                )
        ));
		$data_all = $data_all->toArray();
             
                if(!empty($data_all)){
		$this->set('data_all',json_encode($data_all));
              
		}
                
                
                
          if($this->request->is("post") or $this->request->is("put")){
             
		$usersTable = TableRegistry::get('CmsDetails');
                $user = $usersTable->newEntity();

			$user->page_title=$this->request->data["title11"];
                        $user->slug=$this->request->data["slug"];
			$user->description=$this->request->data["description"];
			$user->meta_title=$this->request->data["meta_title"];
                        $user->meta_key=$this->request->data["meta_key"];
                        $user->meta_description=$this->request->data["meta_desc"];
                       
                        
                        

			$user->created=date("Y-m-d");
			$user->modified=date("Y-m-d");
                        
                            if(!empty($this->request->data["image"])){
				if($this->request->data["image"]["name"])
				{
					$image=$this->imageUpload($this->request->data,"image");
				//	echo $image; exit;
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
                        
                        
                        
                        
                       $user1= $this->CmsDetails->save($user);
                       
                       
                        $insertedId = $user1->id;
                        if(!empty($this->request->data["div_ticket_url_count"])){
                            
                        for($i=0;$i<($this->request->data["div_ticket_url_count"]);$i++){
                             if(!empty($this->request->data["post_name"][$i])){
                
                            $usersTable = TableRegistry::get('CmsPosts');
                          $videos = $usersTable->newEntity();
                          $videos->cms_detail_id=$insertedId;
                          $videos->post_title=$this->request->data["post_name"][$i];
                          $videos->post_description=$this->request->data["post_desc"][$i];
                         
                        //  pr($this->request->data["post_image"]);exit;
                           if(!empty($this->request->data["post_image"][$i]["name"])){
                            
                               
				if($this->request->data["post_image"][$i]["name"])
				{
                                  //  pr($this->request->data["post_image"][$i]["name"]);exit;
					$image=$this->imageUpload11($this->request->data,"post_image",$i);
					//echo $image; exit;
					if($image)
					{
							$videos->image=$image;
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
				unset($videos->image);
			}
                        
                  //        $videos->post_title=$this->request->data["post_image"][$i];
                        
                        
                         $videos->created=date("Y-m-d");
                         $videos->modified=date("Y-m-d");
                       $this->CmsPosts->save($videos);
                        }
                        }}
                          
                       
                        
                 
$this->Flash->set('The data has been successfully inserted.');
 $this->redirect(array("controller"=>"CmsDetails","action"=>"all_cms"));	
                        
		}
      }      
    }
          public function changeStatus($id=NUlL){
         $this->autoRender = false ;

        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
       
           
            
              $user_datas=$this->CmsDetails->get($id, array(
         'recursive' => -1,
	
	    'conditions'=>array(
                'CmsDetails.isdeleted' =>0,
                'CmsDetails.id' =>$id
            ),
        'order' => array(
             'CmsDetails.id' => 'DESC'
            )
        ));     
              
              
            
        
      
         $usersTable = TableRegistry::get('CmsDetails');
         $article = $usersTable->get($id);
         
if($user_datas->status==1){
    $article->status = '0';
}else{
    $article->status = '1';
}
 // Return article with id 12

$usersTable->save($article);
 $this->Flash->set('The data has been successfully updated.');
 $this->redirect(array("controller"=>"cms-details","action"=>"all-cms"));	        

        }
        
        
    }
   
    
    public function ajaxCustomerEditData(){
	    $id=$this->request->data['id'];
               $user_datas=$this->CmsDetails->get($id, array(
         'recursive' => -1,
	'contain'=>array('CmsPosts'),
	    'conditions'=>array(
                'CmsDetails.isdeleted' =>0,
                'CmsDetails.id' =>$id
            ),
        'order' => array(
             'CmsDetails.id' => 'DESC'
            )
        ));      
		$data_all = $user_datas->toArray();
           //  pr($user_datas);exit;
                if(!empty($data_all)){
		$this->set('data_all',json_encode($data_all));
              
		}
         
        
    }
   
     public function updateData (){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
             
         
         if($this->request->is("post") or $this->request->is("put")){
             
		$usersTable33 = TableRegistry::get('CmsDetails');
                $id23=$this->request->data["edit_user_id"];
                $user9 = $usersTable33->get($id23);

			
			$user9->page_title=$this->request->data["title11"];
                        $user9->slug=$this->request->data["slug"];
			$user9->description=$this->request->data["description"];
			$user9->meta_title=$this->request->data["meta_title"];
                        $user9->meta_key=$this->request->data["meta_key"];
                        $user9->meta_description=$this->request->data["meta_desc"];
                       
                        
                        

			$user9->created=date("Y-m-d");
			$user9->modified=date("Y-m-d");
                        
                            if(!empty($this->request->data["image"])){
				if($this->request->data["image"]["name"])
				{
					$image=$this->imageUpload($this->request->data,"image");
				//	echo $image; exit;
					if($image)
					{
							$user9->image=$image;
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
				unset($user9->image);
			}
                        
                        
                        
                        
                    $this->CmsDetails->save($user9);
                       
                        $insertedId11 = $this->request->data["edit_user_id"];
                        
                        $user_datas=$this->CmsPosts->find('all', array(
         'recursive' => -1,
	
	    'conditions'=>array(
	'CmsPosts.cms_detail_id' =>$insertedId11
		 ),
                'order' => array(
                'CmsPosts.id' => 'DESC'
                )
        ));
         $user_datas = $user_datas->toArray();
       // pr($user_datas);exit;
                        foreach($user_datas as $val)    {
                            $users_table = TableRegistry::get('CmsPosts');
                            $users22 = $users_table->get($val->id);
                            $users_table->delete($users22);
                            
                        }
             
                         if(!empty($this->request->data["div_ticket_url_count"])){
                            
                        for($i=0;$i<($this->request->data["div_ticket_url_count"]);$i++){
                             if(!empty($this->request->data["post_name"][$i])){
                
                            $usersTable = TableRegistry::get('CmsPosts');
                          $videos = $usersTable->newEntity();
                          $videos->cms_detail_id=$insertedId11;
                          $videos->post_title=$this->request->data["post_name"][$i];
                          $videos->post_description=$this->request->data["post_desc"][$i];
                         
                        //  pr($this->request->data["post_image"]);exit;
                           if(!empty($this->request->data["post_image"][$i]["name"])){
                            
                               
				if($this->request->data["post_image"][$i]["name"])
				{
                                  //  pr($this->request->data["post_image"][$i]["name"]);exit;
					$image=$this->imageUpload11($this->request->data,"post_image",$i);
					//echo $image; exit;
					if($image)
					{
							$videos->image=$image;
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
				unset($videos->image);
			}
                        
                  //        $videos->post_title=$this->request->data["post_image"][$i];
                        
                        
                         $videos->created=date("Y-m-d");
                         $videos->modified=date("Y-m-d");
                       $this->CmsPosts->save($videos);
                        }
                        }}
                        
                    
                        
                        }
$this->Flash->set('The data has been successfully inserted.');
 $this->redirect(array("controller"=>"CmsDetails","action"=>"all_cms"));	
                        
         }}
          
                
       
      




     public function deleteTicket(){
	  $id=$this->request->data['id'];
            $users_table = TableRegistry::get('EventTicketDetails');
         $users = $users_table->get($id);
         if($users_table->delete($users)){
             echo  1;exit;
         }
            
     }
    
       public function deleteData($id=null){
	    $id=$id;
	    $user=$this->CmsDetails->get($id); 
		$user->isdeleted=1;
		if($this->CmsDetails->save($user))
			{
				$this->Flash->set('The user has been successfully deleted.');
				$this->redirect(array("controller"=>"cms-details","action"=>"all-cms"));
			}
		else
			{
				$this->Session->setFlash(__("User Could Not Be Deleted!Try Again."));
				$this->redirect(array("controller"=>"cms-details","action"=>"all-cms"));
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
        
        public function imageUpload11($data,$name,$field)
	{
		$support_file=array("image/gif","image/jpeg","image/jpg","image/pjpeg","image/x-png","image/png");
          
		if(!empty($data[$name][$field]["name"]))
			{
                   
				if($data[$name][$field]["error"]==0)
				{
					if(in_array($data[$name][$field]["type"],$support_file))
					{
						$image= time().$data[$name][$field]["name"];
						if(!move_uploaded_file($data[$name][$field]["tmp_name"],"img/original/".$image))
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