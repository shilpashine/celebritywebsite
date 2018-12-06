<?php
namespace App\Controller\Franchise;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class CategoriesController extends AppController
{
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
	    $user = $this->Auth->User();
	    if(!empty($user)){
		  if($user['user_type']!=4){
			return $this->redirect($this->Auth->logout());
	        }
		  else{
			 $this->Auth->allow(['login','logout','listCategory','addData','ajaxEditData','editData','viewData','deleteData','changeStatus']); 
		    }
	    }
	    else{
			 $this->Auth->allow(['login','logout','listCategory','addData','ajaxEditData','editData','viewData','deleteData','changeStatus']); 
	    }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Categories');
        $this->loadComponent('RequestHandler');
    } 
	public function listCategory(){	
      $this->viewBuilder()->setLayout('user');
      $datas=$this->Categories->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 ),
	    'conditions'=>array(
				'Categories.is_deleted' =>0
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
		$category_data = $datas->toArray();
		$this->set('category_data',json_encode($category_data));
		$parent_datas=$this->Categories->find('all', array(
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
		$parent_data = $parent_datas->toArray();
		//pr($parent_data);exit;
		$this->set('parent_data',json_encode($parent_data));
    }
    public function addData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
		//pr($this->request->data);exit;
         $category = $this->Categories->newEntity(); 			
         $category->parent_id=$this->request->data['parent_id'];
		 $category->category_name=$this->request->data['category_name'];
		 $category->slug=strtolower($this->request->data['category_name']);
		 $category->description=$this->request->data['description'];
		 $category->created=date("Y-m-d");
		 $category->modified=date("Y-m-d");
		 if($this->request->data["image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"image");
				//echo $image; exit;
		  		if($image)
				{
					   $category->image=$image;
				}
				else
				{
				}
			}
			else
			{
			//unset($category->image);
			}
			 if ($this->Categories->save($category)) {
			 // The $article entity contains the id now
			 //$id = $article->id;
			  $this->Flash->set('The data has been successfully added.');
			  $this->redirect(array("controller"=>"categories","action"=>"list_category"));
			}
			 else{
			  $this->Flash->set('The data could not be added.Try again');
			  $this->redirect(array("controller"=>"categories","action"=>"list_category")); 
			}
		}
    }
    public function ajaxEditData(){
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
		$parent_datas=$this->Categories->find('all', array(
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
		$parent_data = $parent_datas->toArray();
		//pr($parent_data);exit;
		$this->set('category_data',json_encode($category_data));
		$this->set('parent_data',json_encode($parent_data));
    }
    public function editData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
         $id=$this->request->data["edit_category_id"];
		 $category=$this->Categories->get($id);
         $category->parent_id=$this->request->data['edit_parent_id'];
		 $category->category_name=$this->request->data['edit_category_name'];
		 $category->slug=strtolower($this->request->data['edit_category_name']);
		 $category->description=$this->request->data['edit_description'];
		 $category->modified=date("Y-m-d");
		 if($this->request->data["edit_image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"edit_image");
				//echo $image; exit;
		  		if($image)
				{
					   $category->image=$image;
						unlink("img/original/$image");
						unlink("img/large/$image");
						unlink("img/small/$image");
				}
				else
				{
				}
			}
			else
			{
				unset($category->image);
			}
         if ($this->Categories->save($category)) {
		  $this->Flash->set('The data has been successfully updated.');
		  $this->redirect(array("controller"=>"categories","action"=>"list_category"));
         }
		 else{
		  $this->Flash->set('The data could not be updated.Try again');
		  $this->redirect(array("controller"=>"categories","action"=>"list_category")); 
		 }
		 }
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
			$category=$this->Categories->get($id); 
			$category->is_deleted=1;
			if($this->Categories->save($category))
				{
					$this->Flash->set('The Data Has Been Successfully Deleted.');
					$this->redirect(array("controller"=>"categories","action"=>"list_category"));
				}
				else
				{
					$this->Session->setFlash(__("Data Could Not Be Deleted!Try Again."));
					$this->redirect(array("controller"=>"categories","action"=>"list_category"));
				}
    }
    public function changeStatus($id=null){
			$category=$this->Categories->get($id);
			$status=$category->status;
			if($status==1){
			$category->status=0;	
			}
			else{
			$category->status=1;	
			}
			if($this->Categories->save($category))
				{
					$this->Flash->set('The Status has been successfully Changed.');
					$this->redirect(array("controller"=>"categories","action"=>"list_category"));
				}
				else
				{
					$this->Session->setFlash(__("Status Could Not Be Changed!Try Again."));
					$this->redirect(array("controller"=>"categories","action"=>"list_category"));
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
