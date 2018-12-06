<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class CategoriesController extends AppController {
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	    $user = $this->Auth->User();
	    if(!empty($user)){
		  if($user['user_type']!=0){
			return $this->redirect($this->Auth->logout());
	        }
		  else{
		  $this->Auth->allow(['parentIndex']);
                      
                  }
//			 	$this->Auth->allow(['parentIndex','listLead','viewRemark']);
//                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
//		    }
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
		
        $this->loadComponent('RequestHandler');
    } 
    
    public function changeStatus($id=NUlL){
         $this->autoRender = false ;

        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
       
            $user_datas = $this->Categories->find('all', [
                'fields'=>array('id','status'),
    'conditions' => ['Categories.is_deleted' =>0,'Categories.id' =>$id]
])->first();
            
            
            
        
      
         $usersTable = TableRegistry::get('Categories');
         $article = $usersTable->get($id);
         
if($user_datas->status==1){
    $article->status = '0';
}else{
    $article->status = '1';
}
 // Return article with id 12

$usersTable->save($article);
           $this->Flash->set('The data has been successfully updated.');
 $this->redirect(array("controller"=>"categories","action"=>"list_category"));	        

        }
        
        
    }
    
     public function ajaxCustomerEditData(){
	    $id=$this->request->data['id'];
		 //echo $id;exit;
            
             $category_datas11=$this->Categories->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
	'Categories.is_deleted' =>0,
                 'Categories.parent_id' =>0
				
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
		$category_datas11 = $category_datas11->toArray();
                
                
                
		//pr($user_datas);exit;
		if(!empty($category_datas11)){
		//$this->set('category_datas',json_encode($category_datas));
                $this->set('category_datas11',json_encode($category_datas11));
		}
                
                
                
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
		$staff_data = $datas->toArray();
                //print_r($staff_data);exit;
		$this->set('staff_data',json_encode($staff_data));
    }
    
    public function parentIndex($id=NULL){
     //  return 'fhfh';
      //  echo $id;exit;
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
           $user_datas = $this->Categories->find('all', [
                'fields'=>array('id','category_name'),
    'conditions' => ['Categories.id' =>$id]
])->first();
         // return $user_datas['category_name'];
        $this->response->body(json_encode($user_datas['category_name']));
           return $this->response;
            
        }
        }
    
	public function listCategory(){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
         $this->viewBuilder()->setLayout('default_datatable');
         
         $data_all=$this->Categories->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
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
                
                $category_datas11=$this->Categories->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Categories.is_deleted' =>0,
                'Categories.parent_id' =>0
				
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
		$category_datas11 = $category_datas11->toArray();
                
                
                
		//pr($user_datas);exit;
		if(!empty($category_datas11)){
		
                $this->set('category_datas11',json_encode($category_datas11));
		}
                
                
                
                
		}
		else
		{
		$this->redirect(array("controller"=>"users","action"=>"login"));
		}
          if($this->request->is("post") or $this->request->is("put")){
		$usersTable = TableRegistry::get('Categories');
                $category = $usersTable->newEntity();

			
			$category->modified=date("Y-m-d");
			
                        $category->category_name=$this->request->data["category_name"];
			$category->slug=$this->request->data["slug"];
			$category->parent_id=$this->request->data["parent_id"];
                        $category->description=$this->request->data["description"];
                        
			if($this->Categories->save($category))
				{
				    $this->Flash->set('The data has been successfully updated.');
					$this->redirect(array("controller"=>"categories","action"=>"list_category"));	
				}
				
				else
				{
					$this->Flash->set(__("Data Could Not Be Updated"));
					$this->redirect(array("controller"=>"dashboards","action"=>"index"));
				}
		}
      }      
                
        public function deleteData($id=null){
	    $id=$id;
	    $user=$this->Categories->get($id); 
		$user->is_deleted=1;
		if($this->Categories->save($user))
			{
				$this->Flash->set('The Categories has been successfully deleted.');
				$this->redirect(array("controller"=>"categories","action"=>"list_category"));
			}
		else
			{
				$this->Session->setFlash(__("Categories Could Not Be Deleted!Try Again."));
				$this->redirect(array("controller"=>"visitors","action"=>"list_visitor"));
			}
    }
    public function updateData (){
        $userdata=$this->Auth->User();	
        if(!empty($userdata)){		
             
         
          if($this->request->is("post") or $this->request->is("put")){
		$usersTable = TableRegistry::get('Categories');
                $category = $usersTable->get($this->request->data["edit_user_id"]);
         
                
			  $category->category_name=$this->request->data["category_name"];
			$category->slug=$this->request->data["slug"];
			$category->parent_id=$this->request->data["parent_id"];
                        $category->description=$this->request->data["description"];
                        
			$category->modified=date("Y-m-d");
			
  
                        
                        
			if($this->Categories->save($category))
				{
				    $this->Flash->set('The data has been successfully updated.');
					$this->redirect(array("controller"=>"categories","action"=>"list_category"));	
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