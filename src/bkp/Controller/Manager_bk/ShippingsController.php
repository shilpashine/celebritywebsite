<?php
namespace App\Controller\Franchise;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class ShippingsController extends AppController
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
		    $this->Auth->allow(['login','logout','listShipping','viewData','deleteData']);
		    }
	    }
	    else{
		    $this->Auth->allow(['login','logout','listShipping','viewData','deleteData']);
	    }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Orders');
		$this->loadModel('Users');
        $this->loadComponent('RequestHandler');
    } 
	public function listShipping(){	
      $this->viewBuilder()->setLayout('user');
      $datas=$this->Orders->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 ),
	    'conditions'=>array(
				'Orders.is_deleted' =>0,
				'Orders.is_dispatch' =>1
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
}
