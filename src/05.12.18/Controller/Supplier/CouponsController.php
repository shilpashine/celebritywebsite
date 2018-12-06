<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class CouponsController extends AppController {
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
		$user = $this->Auth->User();
		  if(!empty($user)){
			  if($user['user_type']!=3){
				return $this->redirect($this->Auth->logout());
			  }
			  else{
				 $this->Auth->allow(['login','logout','listCoupon','addData','ajaxEditData','editData','viewData','deleteData','changeStatus']); 
				}
		    }
			  else{
				 $this->Auth->allow(['login','logout','listCoupon','addData','ajaxEditData','editData','viewData','deleteData','changeStatus']); 
		   }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Coupons');
        $this->loadComponent('RequestHandler');
    } 
    public function listCoupon(){	
       $this->viewBuilder()->setLayout('user');
       $datas=$this->Coupons->find('all', array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
				'Coupons.is_deleted' =>0
                ),
                'order' => array(
                'Coupons.id' => 'DESC'
                )
        ));
		$coupon_data = $datas->toArray();
		$this->set('coupon_data',json_encode($coupon_data));
    }
    public function addData(){
		 $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
		 $coupon_code=$this->request->data['coupon_code'];
		 $valid_to=$this->request->data['valid_to'];
		 $valid_from=$this->request->data['valid_from'];
		 $discount=$this->request->data['discount'];
         $coupon_data = $this->Coupons->newEntity();
         $coupon_data->coupon_code=$coupon_code;
		 $coupon_data->valid_to=date("Y-m-d", strtotime($valid_to));
		 $coupon_data->valid_from=date("Y-m-d", strtotime($valid_from));
		 $coupon_data->discount=$discount;
		 $coupon_data->created=date("Y-m-d");
		 $coupon_data->modified=date("Y-m-d");
         if ($this->Coupons->save($coupon_data)) {
		      $this->Flash->set('The data has been successfully added.');
			  $this->redirect(array("controller"=>"coupons","action"=>"list_coupon"));
            }
		 else{
		      $this->Flash->set('The data could not be added.Try again');
			  $this->redirect(array("controller"=>"coupons","action"=>"list_coupon")); 
		    }
         }
    }
    public function ajaxEditData(){
		 //$this->viewBuilder()->setLayout('ajax');
	     $id=$this->request->data['id'];
		// echo $id;exit;
		 $datas=$this->Coupons->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Coupons.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$coupon_data = $datas->toArray();
		//pr($coupon_data);exit;
		$this->set('coupon_data',json_encode($coupon_data));
    }
    public function editData(){
	     $this->viewBuilder()->setLayout('user');
		 if($this->request->is("post") or $this->request->is("put")){
	     $id=$this->request->data['edit_coupon_id'];
		 $coupon_code=$this->request->data['edit_coupon_code'];
		 $valid_to=$this->request->data['edit_valid_to'];
		 $valid_from=$this->request->data['edit_valid_from'];
		 $discount=$this->request->data['edit_discount'];
		    $coupon_data =$this->Coupons->get($id); 
			$coupon_data->coupon_code=$coupon_code;
			//$coupon_data->valid_to=$valid_to;
			//$coupon_data->valid_from=$valid_from;
			$coupon_data->valid_to=date("Y-m-d", strtotime($valid_to));
		    $coupon_data->valid_from=date("Y-m-d", strtotime($valid_from));
			$coupon_data->discount=$discount;
			$coupon_data->modified=date("Y-m-d");
			if($this->Coupons->save($coupon_data))
				{
				   $this->Flash->set('The data has been successfully updated.');
		           $this->redirect(array("controller"=>"coupons","action"=>"list_coupon"));
				}
				
				else
				{
					$this->Flash->set('The data could not be updated.Try again');
		            $this->redirect(array("controller"=>"coupons","action"=>"list_coupon")); 
				}
		
		 }
    }
    public function viewData(){
		 //$this->viewBuilder()->setLayout('ajax');
	     $id=$this->request->data['id'];
		 $datas=$this->Coupons->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Coupons.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$coupon_data = $datas->toArray();
		$this->set('coupon_data',json_encode($coupon_data));
    }
    public function deleteData($id=null){
	        $id=$id;
			$user=$this->Coupons->get($id); 
			$user->is_deleted=1;
			if($this->Coupons->save($user))
				{
					$this->Flash->set('The Data Has Been Successfully Deleted.');
					$this->redirect(array("controller"=>"coupons","action"=>"list_coupon"));
				}
				else
				{
					$this->Session->setFlash(__("Data Could Not Be Deleted!Try Again."));
					$this->redirect(array("controller"=>"coupons","action"=>"list_coupon"));
				}
    }
    public function changeStatus($id=null){
			$coupon=$this->Coupons->get($id); // Return article with id 12
			$active=$coupon->active;
			if($active==1){
			$coupon->active=0;	
			}
			else{
			$coupon->active=1;	
			}
			if($this->Coupons->save($coupon))
				{
					$this->Flash->set('The Status has been successfully Changed.');
					$this->redirect(array("controller"=>"coupons","action"=>"list_coupon"));
				}
				else
				{
					$this->Session->setFlash(__("Status Could Not Be Changed!Try Again."));
					$this->redirect(array("controller"=>"coupons","action"=>"list_coupon"));
				}
    }
 }
?>