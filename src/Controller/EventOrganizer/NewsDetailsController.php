<?php
namespace App\Controller\EventOrganizer;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class NewsDetailsController extends AppController {
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	    $user = $this->Auth->User();
	    if(!empty($user)){
		  if($user['user_type']!=4){
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
                 $this->loadModel('EventDetails');
                 $this->loadModel('EventCelebrities');
                 $this->loadModel('EventVideos');
                  $this->loadModel('EventPhotos');
                   $this->loadModel('EventOrganizers');
                   $this->loadModel('EventTicketDetails');
                  
                  $this->loadModel('CelebrityDetails');
                  $this->loadModel('CelebrityVideos');
                $this->loadModel('CelebrityCategories');
               $this->loadModel('CelebrityPhotos');
             
              $this->loadModel('EventCategories');
                $this->loadModel('EventPhotos');
                  $this->loadModel('EventVideos');
             $this->loadModel('NewsDetails');
                     $this->loadModel('OrganizerCelebrities');
                          $this->loadModel('NewsCelebrities');
                           $this->loadModel('NewsPhotos');
                      
                 //   'EventCategories','EventCelebrities','EventOrganizers'
              
        $this->loadComponent('RequestHandler');
    } 
	
    public function listCelebrityAdd(){
      $this->autoRender = false;

         if($this->request->is("post") or $this->request->is("put")){
             
		$usersTable = TableRegistry::get('CelebrityDetails');
                $user = $usersTable->newEntity();

			$user->name=$this->request->data["name"];
			$user->best_at=$this->request->data["best_at"];
			$user->dob=$this->request->data["dob"];
                        $user->gendar=$this->request->data["gendar"];
                        $user->description=$this->request->data["description"];
                        $user->gendar=$this->request->data["gendar"];
			$user->home_location=$this->request->data["home_address"];			
                        $user->current_location=$this->request->data["curr_address"];

			$user->created=date("Y-m-d");
			$user->modified=date("Y-m-d");
                     
                       $user1= $this->CelebrityDetails->save($user);
                         $insertedId = $user1->id;
                         //pr($this->request->data["url"]);exit;
                        for($i=0;$i<count($this->request->data["video_url"]);$i++){
                        //    pr($this->request->data["url"][$i]);exit;
                //$usersTable11 = TableRegistry::get('CelebrityVideos');
                       $videos = $this->CelebrityVideos->newEntity();
                       $videos->celebrity_detail_id=$insertedId;
                        $videos->video_url=$this->request->data["video_url"][$i];
                     //   pr($videos);exit;
                       $this->CelebrityVideos->save($videos);
                        
                        }
                        if(!empty($this->request->data["category_id"])){
                        
                        for($m=0;$m < count($this->request->data["category_id"]);$m++){
                            
                      //   pr($this->request->data["category_id"][$m]);exit;
               // $catsTable = TableRegistry::get('CelebrityCategories');
                $cat_del = $this->CelebrityCategories->newEntity();
                       $cat_del->celebrity_detail_id=$insertedId;
                        $cat_del->category_id=$this->request->data["category_id"][$m];
                         $cat_del->created=date("Y-m-d");
                       $this->CelebrityCategories->save($cat_del);
                        
                        }
                        }
                        
                             if(!empty($this->request->data["image"])){
                         for($k=0;$k<count($this->request->data["image"]);$k++){
                            if(!empty($this->request->data["image"][$k]["name"])){
                //$usersTable11 = TableRegistry::get('CelebrityPhotos');
                $userimage = $this->CelebrityPhotos->newEntity();
                $userimage->celebrity_detail_id=$insertedId;
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
                                            $this->Flash->set('Not successfully inserted.');
 $this->redirect(array("controller"=>"eventDetails","action"=>"event_list"));	
					}
			    }
                            $userimage->created=date("Y-m-d");
                            
                        $this->CelebrityPhotos->save($userimage);    
                            
                        
                              }
                        
                        }
                             }
$this->Flash->set('The data has been successfully inserted.');
 $this->redirect(array("controller"=>"eventDetails","action"=>"event_list"));	
                        
		}
            
	
    }
    
    public function newsLists(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
         
          
         $user_datas=$this->OrganizerCelebrities->find('all', array(
         'recursive' => -1,
		 'contain' => array(
                     'CelebrityDetails'
	    ),
	    'conditions'=>array(
		'OrganizerCelebrities.isdeleted' =>0,
                'OrganizerCelebrities.user_id' =>$userdata['id']
				
                ),
                'order' => array(
                'CelebrityDetails.id' => 'DESC'
                )
        ));
		$user_datas = $user_datas->toArray();
                
	//	pr($user_datas);exit;
		if(!empty($user_datas)){
		$this->set('celebrity_datas11',json_encode($user_datas));
		}
		}
		else
		{
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
                
                
         
         
         
            $data_all_event=$this->NewsDetails->find('all', array(
         'recursive' => -1,
                 
		 'contain' => array(
                    // 'CelebrityDetails'
	    ),
	    'conditions'=>array(
		'NewsDetails.isdeleted' =>0,
                
			
                ),
                'order' => array(
                'NewsDetails.id' => 'DESC'
                )
        ));
           // pr($data_all_event);exit;
		$data_all_event = $data_all_event->toArray();
            // pr($data_all_event);exit;
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
                
              if($this->request->is("post") or $this->request->is("put")){
             
		$usersTable = TableRegistry::get('NewsDetails');
                $user = $usersTable->newEntity();

			$user->news_title=$this->request->data["news_title"];
			$user->news_description=$this->request->data["news_description"];
			$user->publish_date=$this->request->data["publish_date"];
                        $user->created=date("Y-m-d");
			$user->modified=date("Y-m-d");
                       $user1= $this->NewsDetails->save($user);
                        $insertedId = $user1->id;
                        
                        for($m=0;$m < count($this->request->data["event_celebrity"]);$m++){
                            
                      //   pr($this->request->data["category_id"][$m]);exit;
                $catsTable = TableRegistry::get('NewsCelebrities');
                $cat_del = $catsTable->newEntity();
                       $cat_del->news_detail_id=$insertedId;
                        $cat_del->celebrity_id=$this->request->data["event_celebrity"][$m];
                         $cat_del->created=date("Y-m-d");
                       $this->NewsCelebrities->save($cat_del);
                        
                        }
                        
                        
                        
                       for($k=0;$k<count($this->request->data["image"]);$k++){
                            if(!empty($this->request->data["image"][$k]["name"])){
                $usersTable11 = TableRegistry::get('NewsPhotos');
                $userimage = $usersTable11->newEntity();
                $userimage->celebrity_detail_id=$insertedId;
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
                            
                        $this->NewsPhotos->save($userimage);    
                            
                        
                              }
                        
                        }   
                        
              }
                
                
     
      }      
    
          public function changeStatus($id=NUlL){
         $this->autoRender = false ;

        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
       
           
            
              $user_datas=$this->NewsDetails->get($id, array(
         'recursive' => -1,
	
	    'conditions'=>array(
                'NewsDetails.isdeleted' =>0,
                'NewsDetails.id' =>$id
            ),
        'order' => array(
             'NewsDetails.id' => 'DESC'
            )
        ));     
              
              
            
        
      
         $usersTable = TableRegistry::get('NewsDetails');
         $article = $usersTable->get($id);
         
if($user_datas->status==1){
    $article->status = '0';
}else{
    $article->status = '1';
}
 // Return article with id 12

$usersTable->save($article);
 $this->Flash->set('The data has been successfully updated.');
 $this->redirect(array("controller"=>"NewsDetails","action"=>"news_lists"));	        

        }
        
        
    }
    
    public function ajaxCustomerEditData(){
	     $id=$this->request->data['id'];
            $userdata=$this->Auth->User();	
           
         
                
            $data_all_event=$this->NewsDetails->get($id, array(
         'recursive' => -1,
	'contain' => array(
           'NewsCelebrities','NewsPhotos'
	    ),
	    'conditions'=>array(
                'NewsDetails.isdeleted' =>0,
                'NewsDetails.id' =>$id
            ),
        'order' => array(
             'NewsDetails.id' => 'DESC'
            )
        ));     
                
                
           
		$data_all_event = $data_all_event->toArray();
        //    pr($data_all_event);exit;
                if(!empty($data_all_event)){
		$this->set('data_all_event',json_encode($data_all_event));
              
		}    
                
               
                
                
                         
         $user_datas=$this->OrganizerCelebrities->find('all', array(
         'recursive' => -1,
		 'contain' => array(
                     'CelebrityDetails'
	    ),
	    'conditions'=>array(
                'OrganizerCelebrities.isdeleted' =>0,
                'OrganizerCelebrities.user_id' =>$userdata['id']
				
                ),
                'order' => array(
                'CelebrityDetails.id' => 'DESC'
                )
        ));
		$user_datas = $user_datas->toArray();
                
		//pr($user_datas);exit;
		if(!empty($user_datas)){
		$this->set('celebrity_datas',json_encode($user_datas));
		}
                
                
                
    }
   
     public function updateData (){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
             
         
         if($this->request->is("post") or $this->request->is("put")){
             
		$usersTable = TableRegistry::get('NewsDetails');
                $id=$this->request->data["edit_user_id"];
                       $user = $usersTable->get($id);

			$user->news_title=$this->request->data["news_title"];
			$user->news_description=$this->request->data["news_description"];
			$user->publish_date=$this->request->data["publish_date"];
                        $user->created=date("Y-m-d");
			$user->modified=date("Y-m-d");
                       $user1= $this->NewsDetails->save($user);
                        $insertedId = $id;
                        
                        $user_datas=$this->NewsCelebrities->find('all', array(
         'recursive' => -1,
	
	    'conditions'=>array(
	'NewsCelebrities.news_detail_id' =>$insertedId
		 ),
                'order' => array(
                'NewsCelebrities.id' => 'DESC'
                )
        ));
         $user_datas = $user_datas->toArray();
       // pr($user_datas);exit;
                        foreach($user_datas as $val)    {
                            $users_table = TableRegistry::get('NewsCelebrities');
                            $users22 = $users_table->get($val->id);
                            $users_table->delete($users22);
                            
                        }
           
                        
                        
                        
                        
                        if(!empty($this->request->data["event_celebrity"])){
                        for($i=0;$i<count($this->request->data["event_celebrity"]);$i++){
                        //    pr($this->request->data["url"][$i]);exit;
                $usersTable = TableRegistry::get('NewsCelebrities');
                $videos = $usersTable->newEntity();
                       $videos->news_detail_id=$insertedId;
                        $videos->celebrity_id=$this->request->data["event_celebrity"][$i];
                         $videos->created=date("Y-m-d");
                       $this->NewsCelebrities->save($videos);
                        
                        }
                        }
                       
                           if(!empty($this->request->data["image"])){
                         for($k=0;$k<count($this->request->data["image"]);$k++){
                            if(!empty($this->request->data["image"][$k]["name"])){
                $usersTable11 = TableRegistry::get('NewsPhotos');
                $userimage = $usersTable11->newEntity();
                $userimage->news_detail_id=$insertedId;
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
                        $this->NewsPhotos->save($userimage);    
                            
                        
                              }
                        
                        }
$this->Flash->set('The data has been successfully inserted.');
 $this->redirect(array("controller"=>"NewsDetails","action"=>"news_lists"));	
                        
         }}
      }      
                
    }     
      



public function deleteMultiimage(){
	    $id=$this->request->data['id'];
            $users_table = TableRegistry::get('NewsPhotos');
         $users = $users_table->get($id);
         if($users_table->delete($users)){
             echo  1;exit;
         }
            
     }
      public function deleteMultivideo(){
	  $id=$this->request->data['id'];
            $users_table = TableRegistry::get('EventVideos');
         $users = $users_table->get($id);
         if($users_table->delete($users)){
             echo  1;exit;
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
	    $user=$this->NewsDetails->get($id); 
		$user->isdeleted=1;
		if($this->NewsDetails->save($user))
			{
				$this->Flash->set('The user has been successfully deleted.');
				$this->redirect(array("controller"=>"news-details","action"=>"news-lists"));
			}
		else
			{
				$this->Session->setFlash(__("User Could Not Be Deleted!Try Again."));
				$this->redirect(array("controller"=>"news-details","action"=>"news-lists"));
			}
    }
    
    
    
	public function imageUpload($data,$name,$field)
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