<?php
namespace App\Controller\Franchise;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class ProductsController extends AppController
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
			 $this->Auth->allow(['listProduct','addProduct','ajaxEditData','editData','viewData','deleteData','changeStatus']); 
		    }
	    }
	  else{
	      $this->Auth->allow(['listCategory','addData','ajaxEditData','editData','viewData','deleteData','changeStatus']);
	    }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Categories');
		$this->loadModel('Products');
		$this->loadModel('Users');
		$this->loadModel('ProductCategories');
        $this->loadComponent('RequestHandler');
    } 
	public function listProduct(){	
	    $user = $this->Auth->User();
		$user_id=$user['id'];
	    if(!empty($user)){
        $this->viewBuilder()->setLayout('product');
        $datas=$this->Products->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 ),
	    'conditions'=>array(
				'Products.user_id' =>$user_id,
				'Products.is_deleted' =>0
                ),
                'order' => array(
                'Products.id' => 'DESC'
                )
        ));
		$product_data = $datas->toArray();
		//pr($product_data);exit;
		$this->set('product_data',json_encode($product_data));
		$category_data=$this->Categories->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 ),
	    'conditions'=>array(
				'Categories.is_deleted' =>0
				//'Categories.parent_id' =>0
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
		$category_data = $category_data->toArray();
		//pr($category_data);exit;
		$this->set('category_data',json_encode($category_data));
	    }
		else{
		  $this->redirect(array("controller"=>"users","action"=>"login"));
		}
    }
    public function addProduct(){
		//echo "helooo";exit;
		$user = $this->Auth->User();
		$user_id=$user['id'];
	    if(!empty($user)){
		 $this->viewBuilder()->setLayout('product');
		 $category_data=$this->Categories->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 ),
	    'conditions'=>array(
				'Categories.is_deleted' =>0
				//'Categories.parent_id' =>0
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
		$category_data = $category_data->toArray();
		$this->set('category_data',json_encode($category_data));
		 if($this->request->is("post") or $this->request->is("put")){
		 //pr($this->request->data);exit;
         $product = $this->Products->newEntity(); 			
         $product->product_code=$this->request->data['product_code'];
		 //$product->category_id=$this->request->data['category_id'];
		 $product->user_id=$user_id;
		 $product->name=$this->request->data['name'];
		 $product->slug=strtolower($this->request->data['name']);
		 $product->description=$this->request->data['description'];
		 $product->price=$this->request->data['price'];
		 $product->created=date("Y-m-d");
		 $product->modified=date("Y-m-d");
		 if($this->request->data["image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"image");
		  		if($image)
				{
					   $product->image=$image;
				}
				else
				{
				}
			}
			else
			{
			unset($product->image);
			}
			 $product_result=$this->Products->save($product);
			 if($product_result){
			  //$product_id=$this->Products->getLastInsertID();
			  //$result=$this->ModelName->save($whatever);
              $product_id=$product_result->id;
			  for($cat_id=0;$cat_id<count($this->request->data['category_id']);$cat_id++){
			  $product_category = $this->ProductCategories->newEntity(); 			
			  $product_category->product_id=$product_id;	  
			  $product_category->category_id=$this->request->data['category_id'][$cat_id];
			  $product_category->created=date("Y-m-d");
			  $product_category->modified=date("Y-m-d");
			  $this->ProductCategories->save($product_category);
			  }
			  $this->Flash->set('The data has been successfully added.');
			  $this->redirect(array("controller"=>"products","action"=>"list_product"));
			}
			 else{
			  $this->Flash->set('The data could not be added.Try again');
			  $this->redirect(array("controller"=>"products","action"=>"list_product")); 
			}
		}
		}
		else{
		  $this->redirect(array("controller"=>"users","action"=>"login"));
		}
    }
    public function ajaxEditData(){
		$user = $this->Auth->User();
		$user_id=$user['id'];
	    if(!empty($user)){
	     $id=$this->request->data['id'];
		 $datas=$this->Products->get($id, array(
         'recursive' => -1,
		 'contain' => array(
		 'ProductCategories'=>array('Categories'=>array('conditions'=>array(
                'Categories.is_deleted' =>0
            )))
	    ),
	    'conditions'=>array(
                'Products.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$product_data = $datas->toArray();
		/*$cat_id=0;
		if(!empty($product_data)){
			if(!empty($product_data['product_categories'])){
		foreach($product_data['product_categories'] as $prod_val){
			$cat_array[$cat_id]=$prod_val['category']['id'];
			$cat_id++;
		}
		}
		}*/
		//pr($product_data);exit;
		$category_data=$this->Categories->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 ),
	    'conditions'=>array(
				'Categories.is_deleted' =>0
				//'Categories.parent_id' =>0
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
		$category_data = $category_data->toArray();
		$this->set('category_data',json_encode($category_data));
		$this->set('product_data',json_encode($product_data));
	    }
		else{
		  $this->redirect(array("controller"=>"users","action"=>"login"));
		}
    }
    public function editData(){
		$user = $this->Auth->User();
		$user_id=$user['id'];
	    if(!empty($user)){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
         $id=$this->request->data["edit_product_id"];
		 $product=$this->Products->get($id);
         $product->product_code=$this->request->data['edit_product_code'];
		 $product->category_id=$this->request->data['edit_category_id'];
		 $product->name=$this->request->data['edit_name'];
		 $product->slug=strtolower($this->request->data['edit_name']);
		 $product->description=$this->request->data['edit_description'];
		 $product->price=$this->request->data['edit_price'];
		 $product->modified=date("Y-m-d");
		 if($this->request->data["edit_image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"edit_image");
				//echo $image; exit;
		  		if($image)
				{
					   $product->image=$image;
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
				unset($product->image);
			}
         if ($this->Products->save($product)) {
		  $this->Flash->set('The data has been successfully updated.');
		  $this->redirect(array("controller"=>"products","action"=>"list_product"));
         }
		 else{
		  $this->Flash->set('The data could not be updated.Try again');
		  $this->redirect(array("controller"=>"products","action"=>"list_product")); 
		 }
		}
		}
		else{
		  $this->redirect(array("controller"=>"users","action"=>"login"));
		}
    }
    public function viewData(){
		$user = $this->Auth->User();
		$user_id=$user['id'];
	    if(!empty($user)){
	     $id=$this->request->data['id'];
		 $datas=$this->Products->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Products.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$product_data = $datas->toArray();
		$category_data=$this->Categories->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Categories.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$category_data = $category_data->toArray();
		$this->set('product_data',json_encode($product_data));
		$this->set('category_data',json_encode($category_data));
		}
		else{
		  $this->redirect(array("controller"=>"users","action"=>"login"));
		}
    }
    public function deleteData($id=null){
		    $user = $this->Auth->User();
			$user_id=$user['id'];
			if(!empty($user)){
	        $id=$id;
			$product=$this->Products->get($id); 
			$product->is_deleted=1;
			if($this->Products->save($product))
				{
					$this->Flash->set('The Data Has Been Successfully Deleted.');
					$this->redirect(array("controller"=>"products","action"=>"list_product"));
				}
				else
				{
					$this->Session->setFlash(__("Data Could Not Be Deleted!Try Again."));
					$this->redirect(array("controller"=>"products","action"=>"list_product"));
				}
			}
				else{
		        $this->redirect(array("controller"=>"users","action"=>"login"));
		    }
    }
    public function changeStatus($id=null){
		    $user = $this->Auth->User();
			$user_id=$user['id'];
			if(!empty($user)){
			$product=$this->Products->get($id);
			$active=$product->active;
			if($active==1){
			$product->active=0;	
			}
			else{
			$product->active=1;	
			}
			if($this->Products->save($product))
				{
					$this->Flash->set('The Status has been successfully Changed.');
					$this->redirect(array("controller"=>"products","action"=>"list_product"));
				}
				else
				{
					$this->Session->setFlash(__("Status Could Not Be Changed!Try Again."));
					$this->redirect(array("controller"=>"products","action"=>"list_product"));
				}
			}
			else{
		        $this->redirect(array("controller"=>"users","action"=>"login"));
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
