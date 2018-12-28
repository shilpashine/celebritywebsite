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
namespace App\Controller;
//namespace Network\Session;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\Network\Session\DatabaseSession;
use Cake\Routing\Router;

use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
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
			 	$this->Auth->allow(['login','logout','editProfile','replaceTab','swapTab','responseDetail']);
 
		    }
	    }
	    else{
			 $this->Auth->allow(['login','logout','editProfile','replaceTab','swapTab','responseDetail','contact','about']);

	    }
    }
    
   
     public function initialize()
    {
        parent::initialize();
		$this->loadModel('Users');
		$this->loadModel('Categories');
		$this->loadModel('EventDetails');
                $this->loadModel('EventOrganizers');
                $this->loadModel('EventPhotos');
                $this->loadModel('EventCelebrities');
                $this->loadModel('CelebrityDetails');
                 $this->loadModel('CelebrityPhotos');
                 $this->loadModel('EventCategories');
                $this->loadModel('Categories');
              $this->loadModel('EventOrganizers');
               $this->loadModel('VisitorLogs');
                
                                 

        $this->loadComponent('RequestHandler');
    } 

    
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display(...$path)
    {
        $date1=date('Y-m-d');
        $this->viewBuilder()->setLayout('default');
          $data_all11=$this->Categories->find('all', array(
         'recursive' => -1,
		
              'contain' => array(
                     'EventCategories'=>array(
                         'EventDetails'=>array('EventOrganizers'=>['Users'],
                             'EventPhotos','EventCelebrities'=>array('CelebrityDetails'=>array('CelebrityPhotos')),
                            ),
                         'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.event_city' =>$this->request->session()->read('visitor.city'),
                'EventDetails.status' =>1,
                'EventDetails.approx_start_date >' => $date1
              
				
                ),
                         
                         )
                    
	    ),
	    'conditions'=>array(
		'Categories.is_deleted' =>0,
                'Categories.status' =>1,
                'Categories.parent_id' =>0
              
				
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
  $number = $data_all11->count();
  if($number<5){
              $data_all11=$this->Categories->find('all', array(
         'recursive' => -1,
		
              'contain' => array(
                     'EventCategories'=>array(
                         'EventDetails'=>array('EventOrganizers'=>['Users'],
                             'EventPhotos','EventCelebrities'=>array('CelebrityDetails'=>array('CelebrityPhotos'))

                             ),
                         'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.event_country' =>$this->request->session()->read('visitor.country'),
                'EventDetails.status' =>1,
                'EventDetails.approx_start_date >' => $date1
              
				
                ),
                         
                         )
                    
	    ),
	    'conditions'=>array(
		'Categories.is_deleted' =>0,
                'Categories.status' =>1,
                'Categories.parent_id' =>0
              
				
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
  }
         // pr($data_all11);exit;
		$data_all = $data_all11->toArray();
          // pr($data_all);exit;
                if(!empty($data_all)){
		$this->set('data_all',$data_all);
              
		}
                
                
               $datas=$this->CelebrityDetails->find('all', array(
         'recursive' => -1,
	 'contain' => array(
             'CelebrityPhotos'
	    ),
	    'conditions'=>array(
                'CelebrityDetails.isdeleted' =>0,
                'CelebrityDetails.status' =>1
            ),
        'order' => array(
            )
        ));
		$staff_data11 = $datas->toArray();
              //  print_r($staff_data11);exit;
		$this->set('staff_data',json_encode($staff_data11));  
                
                
                
                     $data_all_event=$this->EventDetails->find('all', array(
         'recursive' => -1,
		  'contain' => array('EventPhotos','EventCategories'=>array('Categories'),'EventOrganizers'=>['Users']),
	    'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.status' =>1,
                  'EventDetails.event_city' =>$this->request->session()->read('visitor.city'),
               'EventDetails.approx_start_date >' => $date1 
			
                ),
                   'limit'=>3,      
                'order' => array(
                'EventDetails.id' => 'DESC'
                )
        ));
            
		$data_all_event = $data_all_event->toArray();
             //  pr($data_all_event);exit;
                if(!empty($data_all_event)){
		$this->set('data_all_event',$data_all_event);
            
		}
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
    
    
    public function replaceTab(){
         $date1=date('Y-m-d');
	 $id=$this->request->data['cat_id'];
            $data_all11=$this->Categories->find('all', array(
         'recursive' => -1,
		
              'contain' => array(
                     'EventCategories'=>array(
                         'EventDetails'=>array('EventOrganizers'=>['Users'],
                             'EventPhotos','EventCelebrities'=>array('CelebrityDetails'=>array('CelebrityPhotos'))
                             ),
                         'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.event_city' =>$this->request->session()->read('visitor.city'),
                'EventDetails.status' =>1,
               'EventDetails.approx_start_date >' => $date1 
              
				
                ),
                         
                         )
                    
	    ),
	    'conditions'=>array(
		'Categories.is_deleted' =>0,
                'Categories.status' =>1,
                'Categories.parent_id' =>0,
                'Categories.id' =>$id
              
				
                ),
                'order' => array(
                'Categories.id' => 'DESC'
                )
        ));
         // pr($data_all11);exit;
		$data_all = $data_all11->toArray();
          // pr($data_all);exit;
                if(!empty($data_all)){
		$this->set('data_all',$data_all);
              
		}
                
                
                
                 
            
    }
    public function responseDetail(){
        
        $country=$this->request->data['country'];
        $city=$this->request->data['city'];
        $state=$this->request->data['state'];
        $ipadd=$this->request->data['ipadd'];
      
      
       $this->request->session()->write('visitor.country', $country);
       $this->request->session()->write('visitor.city', $city);
       $this->request->session()->write('visitor.state', $state);
       $this->request->session()->write('visitor.ipadd', $ipadd);
       
    
     //  $this->request->session()->write('visitor.ipadd', $ipadd);
       $sessionid=session_id();
        $url=$_SERVER['HTTP_REFERER'] ;
        $catsTable11 = TableRegistry::get('VisitorLogs');
        $catsvisitor = $catsTable11->newEntity();
                      
                       
                      $catsvisitor->url=$url; 
                    //  pr($catsvisitor);exit;
                      $catsvisitor->country=$country;
                      $catsvisitor->state=$state; 
                       $catsvisitor->city=$city;
                        $catsvisitor->ip_address=$ipadd;
                         $catsvisitor->session_id=$sessionid;
                     
                        $catsvisitor->created=date("Y-m-d");
                        $catsvisitor->modified=date("Y-m-d");
                        
                    if($this->VisitorLogs->save($catsvisitor)){
                        echo 1;exit;
                    }
                   
       exit;
  
      
      
            
            
    }
    public function contact(){
        
        
    }
     public function about(){
        
        
    }
    public function swapTab(){
         $date1=date('Y-m-d');
	  $id=$this->request->data['cat_id'];
          if($id==1){
                     $data_all_event=$this->EventDetails->find('all', array(
         'recursive' => -1,
		  'contain' => array('EventPhotos','EventCategories'=>array('Categories'),'EventOrganizers'=>['Users']),
	    'conditions'=>array(
		'EventDetails.isdeleted' =>0,
                'EventDetails.status' =>1,
                'EventDetails.event_city' =>$this->request->session()->read('visitor.city'),
               'EventDetails.approx_start_date >' => $date1 
			
                ),
                            'limit'=>3,      
                'order' => array(
                'EventDetails.id' => 'DESC'
                )
        ));
            
		$data_all_event = $data_all_event->toArray();
              // pr($data_all_event);exit;
                if(!empty($data_all_event)){
		$this->set('data_all_event',$data_all_event);
            
		}
    
    }
    
  
    
    
    }
    
}
