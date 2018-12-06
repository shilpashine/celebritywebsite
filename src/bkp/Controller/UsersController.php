<?php
namespace App\Controller;
 
use App\Controller\AppController;
use Cake\Event\Event;
 
class UsersController extends AppController {
	public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['add','login','logout','index','admin_login','dashboard']);
    }
    public function initialize()
    {
        parent::initialize();
		$this->loadModel('UserDetails');
        $this->loadComponent('RequestHandler');
    } 
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                //return $this->redirect($this->Auth->redirectUrl());
				$this->redirect(array("controller"=>"users","action"=>"index"));
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
 /*public function admin_login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                //return $this->redirect($this->Auth->redirectUrl());
				$this->redirect(array("controller"=>"users","action"=>"dashboard"));
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }*/
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    //Below are basic crud methods of UsersController
	public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
 
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
 
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
	public function index() {
        $datas=$this->Users->find('all', array(
         'recursive' => -1,
		 'contain' => array(
		 'UserDetails'
	    ),
	    'conditions'=>array(
				//'Users.deleted' =>0
                ),
                'order' => array(
                'Users.id' => 'DESC'
                )
        ));
		$user_data = $datas->toArray();
		//pr($user_data);
		$this->set('user_data',$user_data);		
        //$this->set(compact('characters'));   
    }
}
?>