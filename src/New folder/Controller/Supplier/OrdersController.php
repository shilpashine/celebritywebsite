<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class OrdersController extends AppController
{
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
		$user = $this->Auth->User();
		  if(!empty($user)){
			  if($user['user_type']!=3){
				 return $this->redirect($this->Auth->logout());
			    }
			  else{
		        $this->Auth->allow(['login','logout','listOrder','viewData','deleteData','changeStatus']);
				}
		    }
			  else{
		        $this->Auth->allow(['login','logout','listOrder','viewData','deleteData','changeStatus']);
		   }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Orders');
		$this->loadModel('Users');
        $this->loadComponent('RequestHandler');
    } 
	public function listOrder(){	
      $this->viewBuilder()->setLayout('user');
      $datas=$this->Orders->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 ),
	    'conditions'=>array(
				'Orders.is_deleted' =>0,
				'Orders.is_dispatch' =>0
                ),
                'order' => array(
                'Orders.id' => 'DESC'
                )
        ));
		$order_data = $datas->toArray();
		$this->set('order_data',json_encode($order_data));
    }
	public function viewData(){
	    $id=$this->request->data['id'];
		$datas=$this->Orders->get($id, array(
         'recursive' => -1,
		 'contain' => array(
	    ),
	    'conditions'=>array(
                'Orders.is_deleted' =>0
            ),
        'order' => array(
            )
        ));
		$order_data = $datas->toArray();
		$this->set('order_data',json_encode($order_data));
    }
    public function deleteData($id=null){
	        $id=$id;
			$order=$this->Orders->get($id); 
			$order->is_deleted=1;
			if($this->Orders->save($order))
				{
					$this->Flash->set('The Data Has Been Successfully Deleted.');
					$this->redirect(array("controller"=>"orders","action"=>"list_order"));
				}
				else
				{
					$this->Session->setFlash(__("Data Could Not Be Deleted!Try Again."));
					$this->redirect(array("controller"=>"orders","action"=>"list_order"));
				}
    }
    public function changeStatus($id=null){
			$order=$this->Orders->get($id);
			$is_dispatch=$order->is_dispatch;
			if($is_dispatch==1){
			$order->is_dispatch=0;	
			}
			else{
			$order->is_dispatch=1;	
			}
			if($this->Orders->save($order))
				{
					$this->Flash->set('The Status has been successfully Changed.');
					$this->redirect(array("controller"=>"orders","action"=>"list_order"));
				}
				else
				{
					$this->Session->setFlash(__("Status Could Not Be Changed!Try Again."));
					$this->redirect(array("controller"=>"orders","action"=>"list_order"));
				}
    }
}
