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
            
              $data_all=$this->Categories->find('all', array(
         'recursive' => -1,
		'fields'=>array('id','category_name'),
	    'conditions'=>array(
		'Categories.is_deleted' =>0,
                'Categories.status' =>1
				
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
		$data_all = $data_all->toArray();
             
                if(!empty($data_all)){
		$this->set('data_all',json_encode($data_all));
              
		}
         
                
            $data_all_event=$this->EventDetails->get($id, array(
         'recursive' => -1,
	'contain' => array(
            'EventCategories','EventCelebrities','EventOrganizers','EventPhotos','EventVideos','EventTicketDetails'
	    ),
	    'conditions'=>array(
                'EventDetails.isdeleted' =>0,
                'EventDetails.id' =>$id
            ),
        'order' => array(
             'EventDetails.id' => 'DESC'
            )
        ));     
                
                
           
		$data_all_event = $data_all_event->toArray();
          //  pr($data_all_event);exit;
                if(!empty($data_all_event)){
		$this->set('data_all_event',json_encode($data_all_event));
              
		}    
                
               
                
                
                
          $user_datas11=$this->Users->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Users.is_deleted' =>0,
                 'Users.status' =>1,
				'Users.user_type' =>4
                ),
                'order' => array(
                'Users.id' => 'DESC'
                )
        ));
		$user_datas11 = $user_datas11->toArray();
                
		//pr($user_datas);exit;
		if(!empty($user_datas11)){
		$this->set('celebrity_datas12',json_encode($user_datas11));
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
                
                
                
    }
   
     public function updateData (){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
             
         
         if($this->request->is("post") or $this->request->is("put")){
             
		$usersTable = TableRegistry::get('EventDetails');
                $id=$this->request->data["edit_user_id"];
                       $user = $usersTable->get($id);

			$user->event_title=$this->request->data["event_title"];
			$user->event_description=$this->request->data["description"];
			$user->event_location=$this->request->data["event_location"];
                        $user->event_country=$this->request->data["event_country"];
                        $user->event_city=$this->request->data["event_city"];
                        $user->event_pincode=$this->request->data["event_pincode"];
			$user->lat=$this->request->data["event_lat"];			
                        $user->lang=$this->request->data["event_long"];
                        
                        
                        $user->approx_start_date=$this->request->data["event_startdate"];
			$user->approx_end_date=$this->request->data["event_enddate"];
			$user->start_time=$this->request->data["event_starttime"];
                        $user->end_time=$this->request->data["event_endtime"];
                        $user->event_type=$this->request->data["event_type"];
                        $user->event_amount=$this->request->data["event_amount"];
			$user->target_amount=$this->request->data["event_target_amount"];			
                        if(!empty($this->request->data["is_seats"])){
                         $user->is_seat=$this->request->data["is_seats"];
                        
                        if($this->request->data["is_seats"]==1){
                            if(!empty($this->request->data["event_seats"])){
                        $user->seats=$this->request->data["event_seats"];
                            }
                        }
                        }
			$user->terms=$this->request->data["terms"];
//			$user->dob=$this->request->data["category_id"];
//                        $user->gendar=$this->request->data["event_org_id"];
//                        $user->description=$this->request->data["event_celebrity"];
//                        $user->gendar=$this->request->data["event_amount"];
//			$user->home_location=$this->request->data["event_target_amount"];			
//                        $user->current_location=$this->request->data["event_ticket_price"];
//                         $user->current_location=$this->request->data["is_seats"];
                        
                        
                        

			$user->created=date("Y-m-d");
			$user->modified=date("Y-m-d");
                       $user1= $this->EventDetails->save($user);
                        $insertedId = $id;
                        
                        $user_datas=$this->EventVideos->find('all', array(
         'recursive' => -1,
	
	    'conditions'=>array(
	'EventVideos.event_detail_id' =>$insertedId
		 ),
                'order' => array(
                'EventVideos.id' => 'DESC'
                )
        ));
         $user_datas = $user_datas->toArray();
       // pr($user_datas);exit;
                        foreach($user_datas as $val)    {
                            $users_table = TableRegistry::get('EventVideos');
                            $users22 = $users_table->get($val->id);
                            $users_table->delete($users22);
                            
                        }
             $datas11=$this->EventCategories->find('all', array(
         'recursive' => -1,
	 
	    'conditions'=>array(
                'EventCategories.event_detail_id' =>$insertedId
            )
        
        ));
         $datas11 = $datas11->toArray();
                        foreach($datas11 as $val)    {
                            $users_table = TableRegistry::get('EventCategories');
                            $users = $users_table->get($val->id);
                            $users_table->delete($users);
                            
                        }           
                        
                          
                   $datas12=$this->EventCelebrities->find('all', array(
         'recursive' => -1,
	 
	    'conditions'=>array(
                'EventCelebrities.event_detail_id' =>$insertedId
            )
        
        ));
         $datas11 = $datas12->toArray();
                        foreach($datas11 as $val)    {
                            $users_table = TableRegistry::get('EventCelebrities');
                            $users = $users_table->get($val->id);
                            $users_table->delete($users);
                            
                        }           
                        
                      $datas11=$this->EventOrganizers->find('all', array(
         'recursive' => -1,
	 
	    'conditions'=>array(
                'EventOrganizers.event_detail_id' =>$insertedId
            )
        
        ));
         $datas11 = $datas11->toArray();
                        foreach($datas11 as $val)    {
                            $users_table = TableRegistry::get('eventOrganizers');
                            $users = $users_table->get($val->id);
                            $users_table->delete($users);
                            
                        }           
                                   
                        
                   $datas15=$this->EventTicketDetails->find('all', array(
         'recursive' => -1,
	 
	    'conditions'=>array(
                'EventTicketDetails.event_detail_id' =>$insertedId
            )
        
        ));
         $datas16 = $datas15->toArray();
                        foreach($datas16 as $val)    {
                            $users_table11 = TableRegistry::get('eventTicketDetails');
                            $users22 = $users_table11->get($val->id);
                            $users_table11->delete($users22);
                            
                        }             
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        if(!empty($this->request->data["video_url"])){
                        for($i=0;$i<count($this->request->data["video_url"]);$i++){
                        //    pr($this->request->data["url"][$i]);exit;
                $usersTable = TableRegistry::get('eventVideos');
                $videos = $usersTable->newEntity();
                       $videos->event_detail_id=$insertedId;
                        $videos->video_url=$this->request->data["video_url"][$i];
                         $videos->created=date("Y-m-d");
                       $this->EventVideos->save($videos);
                        
                        }
                        }
                        if(!empty($this->request->data["event_celebrity"])){
                          for($i=0;$i<count($this->request->data["event_celebrity"]);$i++){
                        //    pr($this->request->data["url"][$i]);exit;
                $usersTable = TableRegistry::get('EventCelebrities');
                $videos = $usersTable->newEntity();
                       $videos->event_detail_id=$insertedId;
                        $videos->celebrity_id=$this->request->data["event_celebrity"][$i];
                        $videos->created=date("Y-m-d");
                        $videos->modified=date("Y-m-d");
                       $this->EventCelebrities->save($videos);
                        
                        }
                        }
                        
                         if(!empty($this->request->data["event_org_id"])){
                         for($s=0;$s<count($this->request->data["event_org_id"]);$s++){
                        //    pr($this->request->data["url"][$i]);exit;
                $usersTable = TableRegistry::get('EventOrganizers');
                $evntorg = $usersTable->newEntity();
                       $evntorg->event_detail_id=$insertedId;
                        $evntorg->organizer_id=$this->request->data["event_org_id"][$s];
                        $evntorg->created=date("Y-m-d");
                        $evntorg->modified=date("Y-m-d");
                       $this->EventOrganizers->save($evntorg);
                        
                        }
                         } 
                        
                        
                        if(!empty($this->request->data["category_id"])){
                      for($m=0;$m < count($this->request->data["category_id"]);$m++){
                            
                      //   pr($this->request->data["category_id"][$m]);exit;
                $catsTable = TableRegistry::get('eventCategories');
               $cat_del = $catsTable->newEntity();
                       $cat_del->event_detail_id=$insertedId;
                      $cat_del->category_id=$this->request->data["category_id"][$m];
                        $cat_del->created=date("Y-m-d");
                        $cat_del->modified=date("Y-m-d");
                      $this->EventCategories->save($cat_del);
                        }
                        }   
                        
                        if(!empty($this->request->data["ticket_name"])){
                         for($n=0;$n < count($this->request->data["ticket_name"]);$n++){
                            
                      
                      $catsTable11 = TableRegistry::get('EventTicketDetails');
                      $ticket1 = $catsTable11->newEntity();
                      $ticket1->event_detail_id=$insertedId;
                      $ticket1->ticket_name=$this->request->data["ticket_name"][$n];
                      $ticket1->ticket_desc=$this->request->data["ticket_desc"][$n];
                      $ticket1->ticket_qty=$this->request->data["ticket_qty"][$n];
                      $ticket1->ticket_price=$this->request->data["ticket_price"][$n];      
                      // pr($this->request->data["ticket_name"]);exit;
                        $ticket1->created=date("Y-m-d");
                        $ticket1->modified=date("Y-m-d");
                       // pr($ticket);exit;
                    $this->EventTicketDetails->save($ticket1);
                        
                         }
                         }
                           if(!empty($this->request->data["image"])){
                         for($k=0;$k<count($this->request->data["image"]);$k++){
                            if(!empty($this->request->data["image"][$k]["name"])){
                $usersTable11 = TableRegistry::get('EventPhotos');
                $userimage = $usersTable11->newEntity();
                $userimage->event_detail_id=$insertedId;
                      if($this->request->data["image"][$k])
				{
                         
                                   $image = $this->imageUpload($this->request->data, "image",$k);			
					if($image)
					{
                                          
                                            
							$userimage->image=$image;
							unlink("img/original/$image");
							unlink("img/large/$image");
							unlink("img/small/$image");
					}
					else
					{
					}
			    }
                            $userimage->created=date("Y-m-d");
                             $userimage->modified=date("Y-m-d");
                        $this->EventPhotos->save($userimage);    
                            
                        
                              }
                        
                        }
$this->Flash->set('The data has been successfully inserted.');
 $this->redirect(array("controller"=>"eventDetails","action"=>"event_list"));	
                        
         }}
      }      
                
    }     
      




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