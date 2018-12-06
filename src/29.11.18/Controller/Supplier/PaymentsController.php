<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
class PaymentsController extends AppController
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
		        $this->Auth->allow(['login','logout','listPayment','viewData','invoiceData']);
				}
		    }
			  else{
		        $this->Auth->allow(['login','logout','listPayment','viewData','invoiceData']);
		   }
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('PaymentDetails');
		$this->loadModel('PaymentHistories');
		$this->loadModel('Users');
		$this->loadModel('Orders');
		$this->loadModel('OrderItems');
		$this->loadModel('Products');
		$this->loadModel('Categories');
        $this->loadComponent('RequestHandler');
    } 
	public function listPayment(){	
      $this->viewBuilder()->setLayout('user');
      $datas=$this->Orders->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 'Users'=>array('conditions'=>array('Users.is_deleted'=>0)),
		 'PaymentDetails'=>array('conditions'=>array('PaymentDetails.is_deleted'=>0)),
		 'OrderItems'=>array(
		 'Products'=>array('conditions'=>array('Products.is_deleted'=>0)),
		 'Categories'=>array('conditions'=>array('Categories.is_deleted'=>0))
		 )
		 ),
	    'conditions'=>array(
				'Orders.is_deleted' =>0
                ),
                'order' => array(
                'Orders.id' => 'DESC'
                )
        ));
		$payment_data = $datas->toArray();
		//pr($payment_data);exit;
		$this->set('payment_data',json_encode($payment_data));
    }
	public function viewData(){
	    $id=$this->request->data['id'];
		$datas=$this->Orders->get($id, array(
         'recursive' => -1,
		 'contain' => array(
		 'Users'=>array('conditions'=>array('Users.is_deleted'=>0)),
		 'PaymentDetails'=>array('conditions'=>array('PaymentDetails.is_deleted'=>0)),
		 'OrderItems'=>array(
		 'Products'=>array('conditions'=>array('Products.is_deleted'=>0)),
		 'Categories'=>array('conditions'=>array('Categories.is_deleted'=>0))
		 )
		 ),
	    'conditions'=>array(
                'Orders.is_deleted' =>0
            ),
        'order' => array(
		      //'Orders.id' => 'DESC'
            )
        ));
		$payment_data = $datas->toArray();
		//pr($payment_data);exit;
		$this->set('payment_data',json_encode($payment_data));
    }
	public function invoiceData($id=null){
		$this->viewBuilder()->setLayout('invoice');
	    $id=base64_decode($id);
		$datas=$this->Orders->get($id, array(
         'recursive' => -1,
		 'contain' => array(
		 'Users'=>array('conditions'=>array('Users.is_deleted'=>0)),
		 'PaymentDetails'=>array('conditions'=>array('PaymentDetails.is_deleted'=>0)),
		 'OrderItems'=>array(
		 'Products'=>array('conditions'=>array('Products.is_deleted'=>0)),
		 'Categories'=>array('conditions'=>array('Categories.is_deleted'=>0))
		 )
		 ),
	    'conditions'=>array(
                'Orders.is_deleted' =>0
            ),
        'order' => array(
		      //'Orders.id' => 'DESC'
            )
        ));
		$payment_data = $datas->toArray();
		//pr($payment_data);exit;
		$this->set('payment_data',json_encode($payment_data));
    }
}
