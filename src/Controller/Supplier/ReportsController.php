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
				 $this->Auth->allow(['login','logout','listProduct','viewData']); 
				}
		    }
			  else{
				 $this->Auth->allow(['login','logout','listProduct','viewData']); 
		   }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('Orders');
		$this->loadModel('Users');
        $this->loadComponent('RequestHandler');
    } 
	public function listProduct(){	
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
}
