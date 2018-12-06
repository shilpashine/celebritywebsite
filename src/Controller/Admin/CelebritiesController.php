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
		$this->loadModel('CelebrityDetails');
                $this->loadModel('Categories');
                 $this->loadModel('CelebrityVideos');
                   $this->loadModel('CelebrityPhotos');
                    $this->loadModel('CelebrityCategories');
		
        $this->loadComponent('RequestHandler');
    } 
	
    
    
    public function listCelebrity(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
         
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
         
         
         
         $user_datas=$this->CelebrityDetails->find('all', array(
         'recursive' => -1,
		 'contain' => array(
                     
	    ),
	    'conditions'=>array(
				'CelebrityDetails.isdeleted' =>0,
				
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
		else
		{
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
                
                
                
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
                        for($i=0;$i<count($this->request->data["url"]);$i++){
                        //    pr($this->request->data["url"][$i]);exit;
                $usersTable11 = TableRegistry::get('CelebrityVideos');
                $videos = $usersTable11->newEntity();
                       $videos->celebrity_detail_id=$insertedId;
                        $videos->video_url=$this->request->data["url"][$i];
                       $this->CelebrityVideos->save($videos);
                        
                        }
                        
                        for($m=0;$m < count($this->request->data["category_id"]);$m++){
                            
                      //   pr($this->request->data["category_id"][$m]);exit;
                $catsTable = TableRegistry::get('CelebrityCategories');
                $cat_del = $catsTable->newEntity();
                       $cat_del->celebrity_detail_id=$insertedId;
                        $cat_del->category_id=$this->request->data["category_id"][$m];
                         $cat_del->created=date("Y-m-d");
                       $this->CelebrityCategories->save($cat_del);
                        
                        }
                        
                        
                         for($k=0;$k<count($this->request->data["image"]);$k++){
                            if(!empty($this->request->data["image"][$k]["name"])){
                $usersTable11 = TableRegistry::get('CelebrityPhotos');
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
                            
                        $this->CelebrityPhotos->save($userimage);    
                            
                        
                              }
                        
                        }
$this->Flash->set('The data has been successfully inserted.');
 $this->redirect(array("controller"=>"celebrities","action"=>"list_celebrity"));	
                        
		}
      }      
	
          public function changeStatus($id=NUlL){
         $this->autoRender = false ;

        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
       
            $user_datas = $this->CelebrityDetails->find('all', [
                'fields'=>array('id','status'),
    'conditions' => ['CelebrityDetails.isdeleted' =>0,'CelebrityDetails.id' =>$id]
])->first();
            
            
            
        
      
         $usersTable = TableRegistry::get('CelebrityDetails');
         $article = $usersTable->get($id);
         
if($user_datas->status==1){
    $article->status = '0';
}else{
    $article->status = '1';
}
 // Return article with id 12

$usersTable->save($article);
 $this->Flash->set('The data has been successfully updated.');
 $this->redirect(array("controller"=>"celebrities","action"=>"list_celebrity"));	        

        }
        
        
    }
    
    public function ajaxCustomerEditData(){
	    $id=$this->request->data['id'];
            
            $data_all=$this->Categories->find('all', array(
         'recursive' => -1,
		'fields'=>array('id','category_name'),
	    'conditions'=>array(
				'Categories.is_deleted' =>0,
				
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
		$data_all = $data_all->toArray();
             
                if(!empty($data_all)){
		$this->set('data_all',json_encode($data_all));
              
		}
                
                
		 //echo $id;exit;
	 $datas=$this->CelebrityDetails->get($id, array(
         'recursive' => -1,
	 'contain' => array(
             'CelebrityCategories','CelebrityPhotos','CelebrityVideos'
	    ),
	    'conditions'=>array(
                'CelebrityDetails.isdeleted' =>0
            ),
        'order' => array(
            )
        ));
		$staff_data = $datas->toArray();
               // print_r($staff_data);exit;
		$this->set('staff_data',json_encode($staff_data));
    }
    
     public function updateData (){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
             
         
          if($this->request->is("post") or $this->request->is("put")){
              
		$usersTable10 = TableRegistry::get('CelebrityDetails');
                $id=$this->request->data["edit_user_id"];
                
                        $user111 = $usersTable10->get($id);
                
			 
			$user111->name=$this->request->data["name"];
			$user111->best_at=$this->request->data["best_at"];
			$user111->dob=$this->request->data["dob"];
                        $user111->gendar=$this->request->data["gendar"];
                        $user111->description=$this->request->data["description"];
                        $user111->gendar=$this->request->data["gendar"];
			$user111->home_location=$this->request->data["home_address"];			
                        $user111->current_location=$this->request->data["curr_address"];

			$user111->created=date("Y-m-d");
			$user111->modified=date("Y-m-d");
                     
                       // pr($user111);exit;
                        
			if($this->CelebrityDetails->save($user111))
				{
                            
                            
        $insertedId = $this->request->data["edit_user_id"];
                            
         
         $user_datas=$this->CelebrityVideos->find('all', array(
         'recursive' => -1,
	
	    'conditions'=>array(
	'CelebrityVideos.celebrity_detail_id' =>$insertedId
		 ),
                'order' => array(
                'CelebrityVideos.id' => 'DESC'
                )
        ));
         $user_datas = $user_datas->toArray();
       // pr($user_datas);exit;
                        foreach($user_datas as $val)    {
                            $users_table = TableRegistry::get('CelebrityVideos');
                            $users22 = $users_table->get($val->id);
                            $users_table->delete($users22);
                            
                        }
             $datas11=$this->CelebrityCategories->find('all', array(
         'recursive' => -1,
	 
	    'conditions'=>array(
                'CelebrityCategories.celebrity_detail_id' =>$insertedId
            )
        
        ));
         $datas11 = $datas11->toArray();
                        foreach($datas11 as $val)    {
                            $users_table = TableRegistry::get('CelebrityCategories');
                            $users = $users_table->get($val->id);
                            $users_table->delete($users);
                            
                        }           
                        if(!empty($this->request->data["url"])){
                        for($i=0;$i<count($this->request->data["url"]);$i++){
                        //    pr($this->request->data["url"][$i]);exit;
                $usersTable = TableRegistry::get('CelebrityVideos');
                $videos = $usersTable->newEntity();
                       $videos->celebrity_detail_id=$insertedId;
                        $videos->video_url=$this->request->data["url"][$i];
                       $this->CelebrityVideos->save($videos);
                        
                        }
                        }
                        if(!empty($this->request->data["category_id"])){
                        for($m=0;$m < count($this->request->data["category_id"]);$m++){
                            
                      //   pr($this->request->data["category_id"][$m]);exit;
                $catsTable = TableRegistry::get('CelebrityCategories');
                $cat_del = $catsTable->newEntity();
                       $cat_del->celebrity_detail_id=$insertedId;
                        $cat_del->category_id=$this->request->data["category_id"][$m];
                         $cat_del->created=date("Y-m-d");
                       $this->CelebrityCategories->save($cat_del);
                        
                        }
                        }
                        
                        if(!empty($this->request->data["image"]) && isset($this->request->data["image"])){
                   
                      
                      
                         for($k=0;$k<count($this->request->data["image"]);$k++){
                           //  pr($this->request->data["image"]);exit;
                             if(!empty($this->request->data["image"][$k]["name"])){
                         // echo "dfgdfgdf";exit;
                $usersTable11 = TableRegistry::get('CelebrityPhotos');
                $userimage11 = $usersTable11->newEntity();
                $userimage11->celebrity_detail_id=$insertedId;
                      if($this->request->data["image"][$k])
				{
                         
                                   $image = $this->imageUpload($this->request->data, "image",$k);			
					if($image)
					{
                                          
                                            
							$userimage11->image=$image;
							unlink("img/original/$image");
							unlink("img/large/$image");
							unlink("img/small/$image");
					}
					else
					{
					}
			    }
                            $userimage11->created=date("Y-m-d");
                            
                        $this->CelebrityPhotos->save($userimage11);    
                            
                       }
                         }
                        }
                        
                            
                            $this->Flash->set('The data has been successfully updated.');
			    $this->redirect(array("controller"=>"celebrities","action"=>"list_celebrity"));	
				}
				
				else
				{
					$this->Flash->set(__("Data Could Not Be Updated"));
					$this->redirect(array("controller"=>"dashboards","action"=>"index"));
				}
		}
      }      
                
    }     
      

    
     public function deleteMultiimage(){
	    $id=$this->request->data['id'];
            $users_table = TableRegistry::get('CelebrityPhotos');
         $users = $users_table->get($id);
         if($users_table->delete($users)){
             echo  1;exit;
         }
            
     }
      public function deleteMultivideo(){
	  $id=$this->request->data['id'];
            $users_table = TableRegistry::get('CelebrityVideos');
         $users = $users_table->get($id);
         if($users_table->delete($users)){
             echo  1;exit;
         }
            
     }
    
       public function deleteData($id=null){
	    $id=$id;
	    $user=$this->CelebrityDetails->get($id); 
		$user->isdeleted=1;
		if($this->CelebrityDetails->save($user))
			{
				$this->Flash->set('The user has been successfully deleted.');
				$this->redirect(array("controller"=>"celebrities","action"=>"list-celebrity"));
			}
		else
			{
				$this->Session->setFlash(__("User Could Not Be Deleted!Try Again."));
				$this->redirect(array("controller"=>"celebrities","action"=>"list-celebrity"));
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