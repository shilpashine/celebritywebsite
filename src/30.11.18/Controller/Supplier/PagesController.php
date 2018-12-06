<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		$this->Auth->allow(['listCms','viewData','deleteData','changeStatus','editData','ajaxEditData','addData']);
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Pages');
		$this->loadModel('PageDetails');
        $this->loadComponent('RequestHandler');
    }  
    public function display(...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
	public function listCms(){	
      $this->viewBuilder()->setLayout('user');
      $datas=$this->Pages->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 'PageDetails'=>array(
		  'conditions'=>array(
				'PageDetails.is_deleted' =>0
                ))),
	    'conditions'=>array(
				'Pages.is_deleted' =>0
                ),
                'order' => array(
                'Pages.id' => 'DESC'
                )
        ));
		$cms_data = $datas->toArray();
		$this->set('cms_data',json_encode($cms_data));
}
    public function addData(){
		 $this->viewBuilder()->setLayout('user');
		  if($this->request->is("post") or $this->request->is("put")){
		 //pr($this->request->data);exit;
		 $page = $this->Pages->newEntity();
		 $page->inplace=$this->request->data['inplace'];
		 $page->name=$this->request->data['name'];
		 $page->slug=strtolower($this->request->data['name']);
		 $page->page_title=$this->request->data['page_title'];
		 $page->description=$this->request->data['area'];
		 $page->created=date("Y-m-d");
		 $page->modified=date("Y-m-d");
		 if($this->request->data["image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"image");
				//echo $image; exit;
		  		if($image)
				{
					   $page->image=$image;
						
				}
				else
				{
				}
			}
			else
			{
				//unset($page->image);
			}
         if ($this->Pages->save($page)) {
		  $this->Flash->set('The data has been successfully saved.');
		  $this->redirect(array("controller"=>"pages","action"=>"list_cms"));
         }
		 else{
		  $this->Flash->set('The data could not be saved.Try again');
		  $this->redirect(array("controller"=>"pages","action"=>"list_cms")); 
		 }
        }
	}
/*public function addData(){
		 $this->viewBuilder()->setLayout('user');
		 $coupon_code=$this->request->data['coupon_code'];
		 $valid_to=$this->request->data['valid_to'];
		 $valid_from=$this->request->data['valid_from'];
		 $discount=$this->request->data['discount'];
         $coupon_data = $this->Coupons->newEntity();
         $coupon_data->coupon_code=$coupon_code;
		 $coupon_data->valid_to=date("Y-m-d", strtotime($valid_to));
		 $coupon_data->valid_from=date("Y-m-d", strtotime($valid_from));
		 $coupon_data->discount=$discount;
		 $course->created=date("Y-m-d");
		 $course->modified=date("Y-m-d");
         if ($this->Coupons->save($coupon_data)) {
		   echo "Data Has Been successfully Updated";
         }
		 else{
		   echo "Data Could Not Be Updated.Try Again"; 
		 }
		 exit;
		 if($this->request->is("post") or $this->request->is("put")){
         $course = $this->Courses->newEntity();
         $course->course_name=$this->request->data['course_name'];
		 $resultant_string = str_replace(' ', '', $this->request->data['course_name']);
		 $course->slug=strtolower($resultant_string);
		 $course->created=strtotime(date("Y-m-d"));
		 $course->modified=strtotime(date("Y-m-d"));
         //$article->body = 'This is the body of the article';
         if ($this->Courses->save($course)) {
         // The $article entity contains the id now
         //$id = $article->id;
		  $this->Flash->set('The data has been successfully added.');
		  $this->redirect(array("controller"=>"courses","action"=>"index"));
         }
		 else{
		  $this->Flash->set('The data could not be added.Try again');
		  $this->redirect(array("controller"=>"courses","action"=>"index")); 
		 }
		 }
         }*/		 
public function ajaxEditData(){
	     $id=$this->request->data['id'];
		 $datas=$this->Pages->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Pages.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$cms_data = $datas->toArray();
		$this->set('cms_data',json_encode($cms_data));
    }
    /*public function ajaxEditData(){
	     $id=$this->request->data['ajax_coupon_id'];
		 $ajax_coupon_code=$this->request->data['ajax_coupon_code'];
		 $ajax_valid_to=$this->request->data['ajax_valid_to'];
		 $ajax_valid_from=$this->request->data['ajax_valid_from'];
		 $ajax_discount=$this->request->data['ajax_discount'];
		    $coupon_data =$this->Coupons->get($id); 
			$coupon_data->coupon_code=$ajax_coupon_code;
			$coupon_data->valid_to=$ajax_valid_to;
			$coupon_data->valid_from=$ajax_valid_from;
			$coupon_data->discount=$ajax_discount;
			$coupon_data->modified=date("Y-m-d");
			if($this->Coupons->save($coupon_data))
				{
				    echo "Data Has Been successfully Updated";
				}
				
				else
				{
					 echo "Data Could Not Be Updated.Try Again";
				}
		
	    exit;
    }*/
    public function editData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
			 //pr($this->request->data);exit;
         $id=$this->request->data["edit_page_id"];
		 $page=$this->Pages->get($id);
		 $page->inplace=$this->request->data['edit_inplace'];
		 $page->name=$this->request->data['edit_name'];
		 $page->slug=strtolower($this->request->data['edit_name']);
		 $page->page_title=$this->request->data['edit_page_title'];
		 $page->description=$this->request->data['area'];
		 $page->modified=date("Y-m-d");
		 if($this->request->data["edit_image"]["name"])
			{
				$image=$this->imageUpload($this->request->data,"edit_image");
				//echo $image; exit;
		  		if($image)
				{
					   $page->image=$image;
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
				unset($page->image);
			}
         if ($this->Pages->save($page)) {
		  $this->Flash->set('The data has been successfully updated.');
		  $this->redirect(array("controller"=>"pages","action"=>"list_cms"));
         }
		 else{
		  $this->Flash->set('The data could not be updated.Try again');
		  $this->redirect(array("controller"=>"pages","action"=>"list_cms")); 
		 }
		 }
    }
    public function viewData(){
	     $id=$this->request->data['id'];
		 $datas=$this->Pages->get($id, array(
         'recursive' => -1,
		 'contain' => array(
		 'PageDetails'=>array('conditions'=>array(
                'PageDetails.is_deleted' =>0
            ))
	    ),
	    'conditions'=>array(
                'Pages.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$cms_data = $datas->toArray();
		$this->set('cms_data',json_encode($cms_data));
}
public function deleteData($id=null){
	        $id=$id;
			$user=$this->Pages->get($id); 
			$user->is_deleted=1;
			if($this->Pages->save($user))
				{
					$this->Flash->set('The Data Has Been Successfully Deleted.');
					$this->redirect(array("controller"=>"pages","action"=>"list_cms"));
				}
				else
				{
					$this->Session->setFlash(__("Data Could Not Be Deleted!Try Again."));
					$this->redirect(array("controller"=>"pages","action"=>"list_cms"));
				}
    }
public function changeStatus($id=null){
			$page=$this->Pages->get($id); // Return article with id 12
			$status=$page->status;
			if($status==1){
			$page->status=0;	
			}
			else{
			$page->status=1;	
			}
			if($this->Pages->save($page))
				{
					$this->Flash->set('The Status has been successfully Changed.');
					$this->redirect(array("controller"=>"pages","action"=>"list_cms"));
				}
				else
				{
					$this->Session->setFlash(__("Status Could Not Be Changed!Try Again."));
					$this->redirect(array("controller"=>"pages","action"=>"list_cms"));
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
